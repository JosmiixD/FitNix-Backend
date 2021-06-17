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
            $table->string('time_to_prepare');
            $table->tinyInteger('level');
            $table->string('calories');
            $table->text('ingredients');
            $table->text('instructions');
            $table->string('url_video');
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by');
            // $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('category_id')->unsigned();
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
