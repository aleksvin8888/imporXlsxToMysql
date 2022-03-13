<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_group_id')->unsigned()->nullable();
            $table->bigInteger('rubric_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->bigInteger('product_category_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('vendor_code');
            $table->string('price');
            $table->string('guarantee');
            $table->string('presence');
            $table->timestamps();


            $table->foreign('product_group_id')
                ->references('id')
                ->on('product_groups')
                ->onDelete('cascade');

            $table->foreign('rubric_id')
                ->references('id')
                ->on('rubrics')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');

            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
