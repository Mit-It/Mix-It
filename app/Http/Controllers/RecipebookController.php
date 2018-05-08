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

    public function recipebook(Recipebook $recipebook){
        if($recipebook->user() === Auth::user()){
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

            return redirect()->action('listRecipebooks');


        }
        else {
            return view('pages/access_denied');
        }

    }
}