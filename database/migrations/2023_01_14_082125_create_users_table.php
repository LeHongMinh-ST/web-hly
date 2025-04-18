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
            $table->id();
            $table->string("username")->nullable();
            $table->string("password")->nullable();
            $table->string("email")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("fullname")->nullable();
            $table->tinyInteger("is_super_admin")->nullable();
            $table->bigInteger("role_id")->nullable();
            $table->tinyInteger("status")->nullable();
            $table->bigInteger('create_by')->nullable();
            $table->bigInteger('update_by')->nullable();
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
        Schema::dropIfExists('users');
    }
};
