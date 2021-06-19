<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('time_to_prepare')->nullable();
            $table->tinyInteger('level');
            $table->string('calories')->nullable();
            $table->text('ingredients');
            $table->text('instructions');
            $table->string('video_url')->nullable();
            $table->string('image_url')->default('public/recipe-imgs/no-image.png');
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('user_id');
            // $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('recipes');
    }
}
