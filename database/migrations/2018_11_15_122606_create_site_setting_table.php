<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siteSetting', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('sitename');
            $table->string('siteemail')->unique();
            $table->text('logo')->nullable($value = true);
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
        Schema::table('siteSetting', function (Blueprint $table) {
            Schema::dropIfExists('siteSetting');
        });
    }
}
