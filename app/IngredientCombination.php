<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientCombination extends Model
{

    /**
     * @var Ingredient
     */
    public $ingredient;

    /**
     * @var float
     */
    public $amount = 0.0;


    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }

    /**
     * @return Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * @param Ingredient $ingredient
     */
    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }


}
