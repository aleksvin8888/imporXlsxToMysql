<?php


namespace App\Services;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\Rubric;
use App\Services\Base\MySqlService;
use DB;
use Exception;
use Illuminate\Support\Str;
use Shuchkin\SimpleXLSX;

final class LoadCatalogService extends MySqlService
{

    public function create($data)
    {
        DB::beginTransaction();
        try {

            if($xlsx = SimpleXLSX::parseFile($data['file'])) {

                $col0 = $col1 = $col2 = $col3 = $products = $result =[];
                $result['start_count_rows'] = count($xlsx->rows()) ;

                foreach($xlsx->rows() as $k => $r) {

                    if($k === 0) {
                        continue;
                    } // пропуск первої строки

                    // розбиваєм перші 4 колонки на масиви
                    $col0[] = ['title' => $r[0]];
                    $col1[] = ['title' => $r[1]];
                    $col2[] = ['title' => $r[2]];
                    $col3[] = ['title' => $r[3]];

                    $products[] = [
                        'product_group' => $r[0],
                        'rubric' => $r[1],
                        'product_category' => $r[2],
                        'brand' => $r[3],
                        'title' => $r[4],
                        'vendor_code' => $r[5],
                        'description' => $r[6],
                        'price' => $r[7],
                        'guarantee' => $r[8],
                        'presence' => $r[9],
                    ];

                }
            }

            if(!empty($col0)) {
                foreach($this->getUniqueArray($col0) as $productGroup) {
                   ProductGroup::create($productGroup);
                }
            }

            if(!empty($col1)) {
                foreach($this->getUniqueArray($col1) as $rubric) {
                  Rubric::create($rubric);
                }
            }

            if(!empty($col2)) {
                foreach($this->getUniqueArray($col2) as $productCategory){
                    ProductCategory::create($productCategory);
                }
            }

            if(!empty($col3)) {
                foreach($this->getUniqueArray($col3) as $brand){
                    Brand::create($brand);
                }
            }

            $result['product_category_count'] =  ProductCategory::count();
            $result['rubric_count'] = Rubric::count();
            $result['product_group_count'] =  ProductGroup::count();
            $result['brand_count'] = Brand::count();



            if(!empty($products)) {
                $result['unique_products_count'] = count($this->getUniqueProductArrat($products));
                foreach($this->getUniqueProductArrat($products) as $productIn) {

                    $productGroup = ProductGroup::select('id')
                        ->where('title', '=', $productIn['product_group'])
                        ->first();
                    $rubric = Rubric::select('id')
                        ->where('title', '=', $productIn['rubric'])
                        ->first();
                    $productCategory = ProductCategory::select('id')
                        ->where('title', '=', $productIn['product_category'])
                        ->first();
                    $brand = Brand::select('id')
                        ->where('title', '=', $productIn['brand'])
                        ->first();


                    $product = Product::make();
                    if(!empty($productGroup)) {
                        $product->productGroup()->associate($productGroup);
                    }
                    if(!empty($rubric)){
                        $product->rubric()->associate($rubric);
                    }
                    if(!empty($productCategory)){
                        $product->productCategory()->associate($productCategory);
                    }
                    if(!empty($brand)){
                        $product->brand()->associate($brand);
                    }
                    $product->vendor_code = $productIn['vendor_code'];
                    $product->title = $productIn['title'];
                    $product->description = $productIn['description'];
                    $product->price = $productIn['price'];
                    $product->guarantee = $productIn['guarantee'];
                    $product->presence = $productIn['presence'];

                    $product->save();

                }
            }

            $result['products_add_db_count'] =  Product::count();



            DB::commit();


            return $result;
        } catch(Exception $exception) {
            $this->handleException($exception);
        }
    }

//  фільтруем  масив колонок  на повторення  та пусті значення
    public function getUniqueArray($array)
    {
        $filtered = [];
        foreach($array as $item) {
            if(!empty($item['title'])) {
                $filtered[$item['title']] = $item;
            }
        }
        $outArray = array_values($filtered);

        return $outArray;
    }

    public function getUniqueProductArrat($array)
    {

        $filtered = [];
        foreach($array as $item) {
            if(!empty($item['vendor_code'])) {
                $filtered[$item['vendor_code']] = $item;
            }
        }

        $outArray = array_values($filtered);

        return $outArray;
    }

}
