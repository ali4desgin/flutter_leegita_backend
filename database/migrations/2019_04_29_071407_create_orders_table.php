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
        Schema::create('Tb_Orders', function (Blueprint $table) {

            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id');
            $table->integer("creator_id");
            $table->integer("post_creator_id");
            $table->integer("post_id");
            $table->integer("payment_id");
            $table->enum("status",['confirm','pending']);

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
        Schema::dropIfExists('Tb_Orders');
    }
}
