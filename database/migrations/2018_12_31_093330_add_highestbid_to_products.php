<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHighestbidToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('highestbid');
            $table->integer('lowestask');
            $table->float('sellpercentage');
            $table->integer('volatility');
            $table->char('condition',255)->nullable($value = true);
            $table->integer('trade_range_low');
            $table->integer('trade_range_high');
            $table->text('fblink')->nullable($value = true);
            $table->text('twitterlink')->nullable($value = true);
            $table->text('pinterest')->nullable($value = true);
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
