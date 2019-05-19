<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Payments', function (Blueprint $table) {

            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';

            $table->bigIncrements('id');
            $table->integer('creator_id');
            $table->integer('target_id')->nullable();
            $table->float('total',20,2);
            $table->float('tax');
            $table->float('subtotal');
            $table->float('net');
            $table->enum('method',['paypal','visa_card','master_card','local']);
            $table->string("reference_id")->nullable();
            $table->enum("use",['pay_order','transfer','credit']);
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
        Schema::dropIfExists('Tb_Payments');
    }
}
