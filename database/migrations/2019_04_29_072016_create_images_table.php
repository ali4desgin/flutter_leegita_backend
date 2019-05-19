<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Images', function (Blueprint $table) {

            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id');
            $table->integer("creator_id");
            $table->integer("target_id");
            $table->integer("storing_path");
            $table->enum("target_type",['comment','post']);
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
        Schema::dropIfExists('Tb_Images');
    }
}
