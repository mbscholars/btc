<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('crypto')->default('bitcoin');
            $table->text('terms')->nullable();
            $table->double('min_limit')->default(0);
            $table->double('quantity')->default(0);
            $table->double('max_limit')->default(0);
            $table->double('price');//market,custom
            $table->double('price_value');
            $table->integer('price_type')->default(0); //options 1 above , -1 below
            $table->string('payment_method');
            $table->string('bank_id');
            $table->integer('payment_window'); // in hours
            $table->integer('status');
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
        Schema::dropIfExists('trades');
    }
}
