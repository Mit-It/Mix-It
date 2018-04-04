<?php
/**
 * Created by PhpStorm.
 * User: Jennifer Hauss
 * Date: 27.11.2017
 * Time: 14:36
 */

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipebook;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cocktail;
use App\User;
use App\IngredientCombination;


class CocktailsController extends BaseController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $user = Auth::user();
        return view('pages.index',compact('user'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cocktails(){

        $cocktails =  Cocktail::all();


        return view('pages/cocktails', ['cocktails' => $cocktails]);
    }

    /**
     * @param Cocktail $cocktail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Cocktail $cocktail){
        $ingredients = $cocktail->ingredientcombinations;

        $user = Auth::user();
        return view('pages/detail', ['cocktail' => $cocktail, 'user'=>$user]);

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

            return redirect()->action('CocktailsController@cocktails');


        }
        else {
            return view('pages/access_denied');
        }

    }




}