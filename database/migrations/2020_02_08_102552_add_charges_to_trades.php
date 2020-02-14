<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChargesToTrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trades', function (Blueprint $table) {
            $table->double('trx_charges')->nullable();
            $table->string('reference')->nullable();//this will serve as the wallet label
            $table->string('escrow')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trades', function (Blueprint $table) {
            $table->dropColumn('trx_charges');
            $table->dropColumn('reference');
            $table->dropColumn('escrow');
        });
    }
}
