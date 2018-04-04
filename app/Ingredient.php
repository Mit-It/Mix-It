<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{


    protected $fillable = array('title','unit');



    public function cocktail(){
        return $this->hasMany(Cocktail::class);
    }

    public function ingredientcombination(){
        return $this->hasMany(IngredientCombination::class);
    }




}
