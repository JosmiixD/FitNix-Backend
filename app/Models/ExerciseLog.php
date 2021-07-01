<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_id',
        'sets',
        'reps',
        'weight',
    ];

    protected $hidden = ['created_at'];

    //RELATION:: Exercise has Many Logs and Log belongsTo an Exercise
    public function exercise() {
        return $this->belongsTo('App\Models\Exercise');
    }
}
