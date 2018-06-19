<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;

class LoginController extends BaseController
{
    public function login(Request $req){

        $username= $req->input('username');
        $password= $req->input('password');

        $checkLogin = DB::table('users')->where(['username'=>$username, 'password'=>$password])->get();

        if(count($checkLogin) > 0){
            echo "login successfull!";
        }
        else{
            echo "login failed";
        }
    }
}
