<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('gender_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('display_picture_link');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('gender_id')->references('gender_id')->on('genders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
