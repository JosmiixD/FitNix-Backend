<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExerciseWorkoutPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_workout', function (Blueprint $table) {
            $table->unsignedBigInteger('exercise_id')->index();
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
            $table->unsignedBigInteger('workout_id')->index();
            $table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');
            $table->primary(['exercise_id', 'workout_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_workout');
    }
}
