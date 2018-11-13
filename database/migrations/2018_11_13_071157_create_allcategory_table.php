<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allcategory', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('category_name');
            $table->string('category_type');
            $table->longText('description')->nullable($value = true);
            $table->text('image')->nullable($value = true);
            $table->integer('is_active');
            $table->integer('parent_id');
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
        Schema::table('allcategory', function (Blueprint $table) {
            //
        });
    }
}
