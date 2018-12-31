<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('p_name');
            $table->text('p_description')->nullable($value = true);
            $table->integer('cat_id');
            $table->integer('subcat_id')->nullable($value = true);
            $table->integer('brand_id');
            //$table->integer('color_id');
            $table->char('color_id',55)->nullable($value = true);
            $table->integer('is_active');
            $table->integer('price');
            $table->char('pro_uni_id',255);
            $table->integer('size_type');
            $table->char('size',55)->nullable($value = true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
