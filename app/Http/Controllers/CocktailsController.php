<?php
/**
 * Created by PhpStorm.
 * User: Jennifer Hauss
 * Date: 27.11.2017
 * Time: 14:36
 */

namespace App\Http\Controllers;

use App\Http\Service\RatingService;
use App\Ingredient;
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


class CocktailsController extends BaseController
{
    /**
    *
    * @var CocktailSelectionAll
    */
    protected $cocktailSelectionInterface;

    /*
     *
     * @var RatingService
     */
    protected $ratingService;

    /**
     * Create a new controller instance.
     *
     * @param  RatingService  $ratingService
     */
    public function __construct(RatingService $ratingService, CocktailSelectionAll $cocktailSelectionInterface)
    {
        $this->ratingService = $ratingService;
        $this->cocktailSelectionInterface = $cocktailSelectionInterface;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cocktails(){
        $cocktails =  $this->cocktailSelectionInterface.getCocktails();

        return view('pages/cocktails', ['cocktails' => $cocktails]);
    }

    /**
     * @param Cocktail $cocktail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Cocktail $cocktail){
        $user = Auth::user();
        $userRating = null;
        if($user) {
            $userRating = $this->ratingService->getRating($user, $cocktail);
        }
        $rating = $this->ratingService->avgRating($cocktail);
        $ratingCount = count($cocktail->ratings());

        return view('pages/detail',
            [
                'cocktail' => $cocktail,
                'user'=>$user,
                'rating'=>$rating,
                'userRating'=>$userRating,
                'ratingCount'=>$ratingCount
            ]);

    }


    /**
     * @param Cocktail $cocktail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deleteconfirm(Cocktail $cocktail){
        $user = Auth::user();

        if ($user->role == "admin"
            || $cocktail->createdByUser == $user) {
            return view('pages/delete_confirm', ['cocktail' => $cocktail]);
        }
        else {
            return view('pages/access_denied');
        }
    }

    /**
     * @param Cocktail $cocktail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function delete(Cocktail $cocktail){
        $user = Auth::user();
        if ($user->role == "admin"
            || $cocktail->createdByUser == $user){

            //$pictures = $cocktail->pictures;
            $ingCombis = $cocktail->ingredientcombinations;

            /*foreach ($pictures as $picture){
                $picture->delete();
            }*/
            foreach ($ingCombis as $combi ){
                $combi->delete();
            }

            $cocktail->delete();
            Session::flash('success', 'Cocktail wurde erfolgreich gelöscht');
            return redirect()->action('CocktailsController@cocktails');
        }
        else {
            return view('pages/access_denied');
        }
    }

    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function new_cocktail(Request $req){
        $user = Auth::user();

        if($user){
            $cocktail = new Cocktail;
            $cocktail->user_id = $user->id;
            $cocktail->title = $req->input('title');
            $cocktail->description = $req->input('description');
            $cocktail->makingdescription = $req->input('makingDescription');

            $cocktail->save();

            for($i=0; $i<10; $i++) {

                $ititle = trim($req->input('ing-title-' . $i));
                $iunit = $req->input('ing-unit-' . $i);
                if ($ititle != "") {
                    $ingredient = Ingredient::where('title', $ititle)->where('unit', $iunit);
                    if ($ingredient->count() == 0) {
                        $ingredient = new Ingredient;
                        $ingredient->title = $ititle;
                        $ingredient->unit = $iunit;

                        $ingredient->save();
                    } else {
                        $ingredient = $ingredient->first();
                        $ingredient->save();
                    }

                    $ingredientcombi = new IngredientCombination;
                    $ingredientcombi->ingredient_id = $ingredient->id;
                    $ingredientcombi->cocktail_id = $cocktail->id;
                    $ingredientcombi->amount = $req->input('ing-amount-' . $i);

                    $ingredientcombi->save();

                }
            }
            $cocktails = Cocktail::all();

            Session::flash('success', 'Cocktail wurde erfolgreich erstellt');
            return redirect()->action('CocktailsController@cocktails');


        }
        else {
            return view('pages/access_denied');
        }

    }




}