<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Comments', function (Blueprint $table) {


            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';


            $table->bigIncrements('id');
            $table->integer("post_id");
            $table->integer("creator_id");
            $table->string("message")->nullable();
            $table->boolean("has_images")->default(0);
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
        Schema::dropIfExists('Tb_Comments');
    }
}
