<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientCombination extends Model
{

    protected $fillable = array('amount');

    public function ingredient(){
        return $this->belongsTo(Ingredient::class);
    }

    public function cocktail(){
        return $this->belongsTo(Cocktail::class, 'cocktail_id');
    }
}
