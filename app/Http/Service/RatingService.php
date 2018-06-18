<?php
/**
 * Created by PhpStorm.
 * User: Jennifer Hauss
 * Date: 27.11.2017
 * Time: 14:36
 */

namespace App\Http\Service;

use App\Rating;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cocktail;
use Session;


class RatingService extends BaseController
{

    /**
     * @param Cocktail $cocktail
     * @return float
     */
    public function avgRating(Cocktail $cocktail) {
        $count = 0;
        $sum = 0;
        foreach ($cocktail->ratings() as $rating){
            $sum = $sum + $rating->value;
            $count++;
        }
        $avg = round($sum / $count, 1);
        return $avg;
    }


    /**
     * @param User $user
     * @param Cocktail $cocktail
     * @return bool
     */
    public function userRatedCocktail(User $user, Cocktail $cocktail){
        $rated = false;
        foreach ($user->ratings() as $rating){
            if ($rating->cocktail->id == $cocktail->id){
                $rated = true;
            }
        }

        return $rated;
    }

}