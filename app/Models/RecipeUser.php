<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeUser extends Model
{
    use HasFactory;

    protected $table = 'recipe_user';


    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function recipe() {
        return $this->belongsTo('App\Models\Recipe');
    }
}
