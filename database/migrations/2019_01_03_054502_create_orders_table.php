<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->float('price')->nullable($value = true);
            $table->integer('shiping_charge')->nullable($value = true);
            $table->float('total_amount');
            $table->char('currency',55)->nullable($value = true);
            $table->char('order_status',55);
            $table->char('order_type',5);
            $table->dateTime('order_date');
            $table->char('transaction_id',255)->nullable($value = true);
            $table->integer('payment_reference');
            $table->dateTime('payment_date');
            $table->char('transaction_id_tip',255)->nullable($value = true);
            $table->integer('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
