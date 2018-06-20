<?php
/**
 * Created by PhpStorm.
 * User: z003nfnv
 * Date: 04.06.2018
 * Time: 12:44
 */

namespace App\Http\Controllers\Strategy\Strategies;

use App\Http\Controllers\Strategy\Interfaces\ICocktailSelection;
use App\Cocktail;

class CocktailSelectionAll implements ICocktailSelection
{

    public function getCocktails()
    {
        return Cocktail::all();
    }
}