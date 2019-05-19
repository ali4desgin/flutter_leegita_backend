<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostProbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Post_probs', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id');
            $table->integer("post_id");
            $table->integer("category_id");
            $table->integer("prob_title_id");
            $table->integer("prob_value_id");
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
        Schema::dropIfExists('Tb_Post_probs');
    }
}
