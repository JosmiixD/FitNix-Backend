<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [ 'pivot','created_at', 'updated_at'];

    protected $with = ['logs'];

    //RELATION:: Workout Many to Many Exercise I.E. Workout has Many Exercise and Exercise can be in many Workouts
    public function workout() {
        return $this->belongsToMany('App\Models\Workout');
    }

    //RELATION:: Exercise has Many Logs and Log belongsTo an Exercise
    public function logs() {
        return $this->hasMany('App\Models\ExerciseLog');
    }
}
