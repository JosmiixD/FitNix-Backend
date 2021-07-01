<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'height',
        'gender',
        'level',
        'birthday',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['roles'];


    public function recipes() {
        return $this->hasMany('App\Models\Recipe');
    }

    //RELATION:: User has Many Workouts I.E. Josmar created ABS Workout
    public function workouts() {
        return $this->hasMany('App\Models\Workout');
    }

    
    public function weightLogs() {
        return $this->hasMany('App\Models\WeightLog');
    }

    public function recipesLiked() {
        return $this->belongsToMany('App\Models\Recipe');
    }
}
