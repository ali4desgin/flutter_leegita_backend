<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAuthenticationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_UserAuthentications', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';

            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('authentication_code')->nullable();
            $table->enum('status',['used',"not_used"])->default("not_used");
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
        Schema::dropIfExists('Tb_UserAuthentications');
    }
}
