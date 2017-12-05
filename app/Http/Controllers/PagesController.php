<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function cocktails()
    {
        return view('pages.cocktails');
    }

    public function aboutus()
    {
        return view('pages.aboutus');
    }


    public function login(){
        return view('pages.login');
    }

}
