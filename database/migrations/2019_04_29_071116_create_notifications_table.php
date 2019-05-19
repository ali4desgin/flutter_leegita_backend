<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Notifications', function (Blueprint $table) {


            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';


            $table->bigIncrements('id');
            $table->enum('type',['global','private']);
            $table->enum('status',['viewed','new']);
            $table->integer('creator_id')->nullable();
            $table->integer('target_id');
            $table->string('content')->nullable();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('Tb_Notifications');
    }
}
