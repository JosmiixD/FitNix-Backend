<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'day'
    ];

    

    //RELATION:: Workout belongsTo user I.E Josmar created Abs Workout
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    //RELATION:: Workout Many to Many Exercise I.E. Workout has Many Exercise and Exercise can be in many Workouts
    public function exercise() {
        return $this->belongsToMany('App\Models\Exercise');
    }
}
