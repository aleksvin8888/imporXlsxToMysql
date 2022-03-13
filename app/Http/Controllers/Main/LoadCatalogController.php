<?php

namespace App\Http\Controllers\Main;

use App\Http\Requests\LoadCatalogRequest;
use App\Services\LoadCatalogService;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;


class LoadCatalogController extends BaseController
{


    private $loadCatalogService;

    /**
     * @param LoadCatalogService $loadCatalogService
     */
    public function __construct(LoadCatalogService $loadCatalogService)
    {
        $this->loadCatalogService = $loadCatalogService;
    }


    public function store(LoadCatalogRequest $request)
    {
        $catalog = $this
            ->loadCatalogService
            ->create($request->validated());
        if($catalog) {
            return view('home', compact('catalog'));
        } else {
            return back()->withErrors(['msd' => 'Помилка збереження.'])
                ->withInput();
        }
    }


}
