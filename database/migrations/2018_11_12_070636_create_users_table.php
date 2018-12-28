<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->char('password',255);
            $table->char('first_name', 100)->nullable($value = true);
            $table->char('last_name', 100)->nullable($value = true);
            $table->integer('is_active');
            $table->text('image')->nullable($value = true);
            $table->char('phone',255)->nullable($value = true);
            $table->integer('user_type');
            $table->text('payment_key')->nullable($value = true);
            $table->text('payment_id')->nullable($value = true);
            $table->integer('approve')->nullable($value = true);
            $table->string('currency')->nullable($value = true);
            $table->string('shoesize')->nullable($value = true);
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
        Schema::dropIfExists('users');
    }
}
