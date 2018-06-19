<?php
/**
 * Created by PhpStorm.
 * User: Jennifer Hauss
 * Date: 27.11.2017
 * Time: 14:36
 */

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Illuminate\Support\Facades\Auth;
use App\Cocktail;
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
            return redirect()->action('CocktailsController@detail', ['cocktail'=>$cocktail]);


        }
        else {
            return view('pages/access_denied');
        }
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changeRating(Request $req){
        $user = Auth::user();
        $rating = Rating::find($req->input("ratingId"));

        if($user && $rating->createdByUser->id == $user->id){

            $rating->value = $req->input('rating');

            $rating->save();

            $cocktail = Cocktail::find($req->input('cocktail'));
            Session::flash('success', 'Bewertung wurde geändert');
            return redirect()->action('CocktailsController@detail', ['cocktail'=>$cocktail]);

        }
        else {
            return view('pages/access_denied');
        }

    }




}