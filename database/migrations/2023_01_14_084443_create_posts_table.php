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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->text("content")->nullable();
            $table->tinyInteger("status")->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('language')->nullable();
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
