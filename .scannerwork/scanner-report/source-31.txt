<?php
/**
 * Created by PhpStorm.
 * User: z003nfnv
 * Date: 04.06.2018
 * Time: 12:44
 */

namespace App\Http\Controllers\Strategy\Interfaces;


use App\Cocktail;

class CocktailSelectionSortByClicks implements ICocktailSelection
{

    public function getCocktails()
    {
        //Cocktail::all();
        //return Cocktail::all();
    }

}