<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Likes', function (Blueprint $table) {

            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';


            $table->bigIncrements('id');
            $table->integer("target_id");
            $table->enum("type",['user','post']);
            $table->integer("liker_id");
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
        Schema::dropIfExists('Tb_Likes');
    }
}
