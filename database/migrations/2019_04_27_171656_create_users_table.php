<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_Users', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';

            $table->bigIncrements('id');
            $table->string('phone')->unique();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('bio')->nullable();
            $table->string('website')->nullable();
            $table->boolean('isActive')->default(1);
            $table->boolean('isOnline')->default(1);
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
        Schema::dropIfExists('Tb_Users');
    }
}
