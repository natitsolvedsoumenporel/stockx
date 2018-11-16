<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emailTemplate', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('subject');
            $table->longText('content')->nullable($value = true);
            $table->integer('activated');
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
        Schema::table('emailTemplate', function (Blueprint $table) {
            Schema::dropIfExists('emailTemplate');
        });
    }
}
