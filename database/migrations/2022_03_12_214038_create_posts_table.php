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
        Schema::create('posts', static function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('body');
            $table->unsignedBigInteger('user_id');
            $table->date('published_at')->useCurrent();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            //$table->string('image_path');
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
