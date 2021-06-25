<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'time_to_prepare',
        'level',
        'calories',
        'ingredients',
        'instructions',
        'video_url',
        'image_url',
        'status',
        'user_id',
        'category_id',
    ];

    protected $with = ['user', 'category'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }


    //ADDED
    public function recipeLike() {
        return $this->hasMany('App\Models\RecipeUser');
    }

    public function isLikedByUser() {
        return $this->recipeLike->where('user_id', Auth::id());
    }

    // END ADDED

    public function usersLikes() {
        return $this->belongsToMany(User::class);
    }

    public function scopeGetRecipes( $query, $name_filter, $sort,$fieldToSort ){
        return $this->where(function($query) use ($name_filter){
            $query->where('name','LIKE','%'.$name_filter.'%');
        })->orderBy($fieldToSort,$sort)->get();
    }
}
