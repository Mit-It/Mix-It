<?php
/**
 * Created by PhpStorm.
 * User: Jennifer Hauss
 * Date: 27.11.2017
 * Time: 14:36
 */

namespace App\Http\Controllers;

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
use Session;


class RecipebookController extends BaseController
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listRecipebooks(){
        /** @var User $user*/
        $user = Auth::user();

        if($user){
            $recipebooks = $user->recipebooks;
            return view('pages/recipebook_overview', ['recipebooks' => $recipebooks]);
        }
        else {
            return view('pages/access_denied');
        }

    }


    /**
     * @param Recipebook $recipebook
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recipebook(Recipebook $recipebook){
        if($recipebook->user->id === Auth::user()->id){
            $cocktails = $recipebook->cocktails();

            return view('pages/recipebook', ['recipebook'=> $recipebook, 'cocktails' => $cocktails]);
        }
        else {
            return view('pages/access_denied');
        }

    }

    public function createRecipebook(Request $req){
        $user = Auth::user();

        if($user){
            $recipebook = new Recipebook();
            $recipebook->user_id = $user->id;
            $recipebook->title = $req->input('title');

            $recipebook->save();

            Session::flash('success', 'Rezeptbuch wurde erfolgreich erstellt');

            return redirect()->action('RecipebookController@listRecipebooks');


        }
        else {
            return view('pages/access_denied');
        }

    }

    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addCocktail(Request $req){
        $user = Auth::user();

        if($user){
            $cocktailId = $req->input('cocktail');
            $cocktail = Cocktail::find($cocktailId);
            $recipebook = Recipebook::find($req->input('recipebook'));

            $add = true;
            foreach ($recipebook->cocktails as $cocktail){
                if($cocktail->id == $cocktailId){
                    $add = false;
                    Session::flash('warning', 'Cocktail ist bereits im Rezeptbuch!');
                }
            }

            if($add){
                $recipebook->cocktails()->attach($cocktailId);
                Session::flash('success', 'Cocktail wurde erfolgreich zum Rezeptbuch hinzugefügt');
            }



            return redirect()->action('CocktailsController@detail', ['cocktail' => $cocktail]);


        }
        else {
            return view('pages/access_denied');
        }

    }

    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function deleteCocktail(Request $req){
        $user = Auth::user();

        if($user){
            $cocktailId = $req->input('cocktail');
            $recipebook = Recipebook::find($req->input('recipebook'));

            $recipebook->cocktails()->detach($cocktailId);

            Session::flash('success', 'Cocktail wurde erfolgreich aus dem Rezeptbuch entfernt');
            return redirect()->action('RecipebookController@recipebook', ['recipebook' => $recipebook]);


        }
        else {
            return view('pages/access_denied');
        }
    }

    /**
     * @param Recipebook $recipebook
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deleteconfirm(Recipebook $recipebook){
        $user = Auth::user();

        if ($recipebook->user == $user) {
            return view('pages/delete_rb_confirm', ['recipebook' => $recipebook]);
        }
        else {
            return view('pages/access_denied');
        }
    }

    /**
     * @param Recipebook $recipebook
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(Recipebook $recipebook){
        $user = Auth::user();
        if ($recipebook->user == $user) {

            $recipebook->delete();

            Session::flash('success', 'Rezeptbuch wurde erfolgreich gelöscht');
            return redirect()->action('RecipebookController@listRecipebooks');
        }
        else {
            return view('pages/access_denied');
        }
    }

}