<?php

namespace App\Http\Controllers;

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
use App\User;
use App\IngredientCombination;



class PagesController extends BaseController
{



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $user = Auth::user();
        return view('pages.index',compact('user'));

    }

    public function create()
    {

        if(Auth::user()){
            return view('pages.create');
        }
        else{
            return view('pages.access_denied');
        }

    }


    public function aboutus()
    {
        return view('pages.aboutus');
    }

    public function newRecipebook()
    {

        if(Auth::user()){
            return view('pages.newRecipebook');
        }
        else{
            return view('pages.access_denied');
        }

    }

}
