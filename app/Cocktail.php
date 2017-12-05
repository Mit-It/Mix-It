<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{


    protected $fillable = array('title', 'description');


    /*
    public function createdByUser(){
        return $this->belongsTo(User::class);
    }


    public function picture(){
        return $this->hasOne(Picture::class);
    }

    public function ingredientCombinations(){
        return $this->hasMany(IngredientCombination::class);
    }
    */

}
