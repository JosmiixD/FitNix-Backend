<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'url_video',
        'status',
        'created_by',
        'category_id',
    ];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function category() {
        return $this->belongsTo('App\Models\Category','cateogory_id','id');
    }

    public function scopeGetRecipes( $query, $name_filter, $sort,$fieldToSort ){
        return $this->where(function($query) use ($name_filter){
            $query->where('name','LIKE','%'.$name_filter.'%');
        })->orderBy($fieldToSort,$sort)->get();
    }
}
