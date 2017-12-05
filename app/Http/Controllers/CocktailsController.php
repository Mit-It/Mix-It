<?php
/**
 * Created by PhpStorm.
 * User: Jennifer Hauss
 * Date: 27.11.2017
 * Time: 14:36
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cocktail;

class CocktailsController extends BaseController
{

    public function index(){

        $user = Auth::user();
        return view('pages.index',compact('user'));

    }

    public function cocktails(){

        $cocktails =  Cocktail::all();


        return view('pages/cocktails', ['cocktails' => $cocktails]);
    }

    public function detail(Cocktail $cocktail){

        return view('pages/detail', ['cocktail' => $cocktail]);

    }


}