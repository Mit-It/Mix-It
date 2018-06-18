<?php
/**
 * Created by PhpStorm.
 * User: Jennifer Hauss
 * Date: 27.11.2017
 * Time: 14:36
 */

namespace App\Http\Controllers;

use App\Ingredient;
use App\Rating;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cocktail;
use App\IngredientCombination;
use Session;


class RatingController extends BaseController
{
    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function rateCocktail(Request $req){
        $user = Auth::user();

        if($user){
            $rating = new Rating;
            $ratingValue = $req->input('rating');
            $cocktailId = $req->input('cocktail');
            $cocktail = Cocktail::find($cocktailId);

            $rating->cocktail_id = $cocktailId;
            $rating->value = $ratingValue;
            $rating->user_id = $user->id;

            $rating->save();

            Session::flash('success', 'Bewertung wurde gespeichert');
            return view('pages/detail', ['cocktail' => $cocktail, 'user'=>$user]);


        }
        else {
            return view('pages/access_denied');
        }

    }




}