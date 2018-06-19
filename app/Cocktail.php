<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{


    protected $fillable = array('title');



    public function createdByUser(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function picture(){
        return $this->hasMany(Picture::class);
    }

    public function ingredientcombinations(){
        return $this->hasMany(IngredientCombination::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

}
