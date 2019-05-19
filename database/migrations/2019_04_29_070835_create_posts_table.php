<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Posts', function (Blueprint $table) {

            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id');
            $table->integer('creator_id');
            $table->integer('category_id');
            $table->string('title')->nullable();
            $table->string('currency')->nullable();
            $table->string('description')->nullable();
            $table->float('price',20,2)->nullable();
            $table->string('location')->nullable();
            $table->enum('status',['paid','blocked','issued'])->default("issued");
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
        Schema::dropIfExists('Tb_Posts');
    }
}
