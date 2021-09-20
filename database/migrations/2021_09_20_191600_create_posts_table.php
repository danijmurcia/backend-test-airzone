<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->string('title');
            $table->string('slug');
            $table->string('marks');
            $table->string('short_content');
            $table->string('content');
            $table->string('picture');
            $table->string('comment');
            $table->tinyInteger('pending');
            $table->tinyInteger('public');
            $table->boolean('active');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // FOREIGN
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
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
}
