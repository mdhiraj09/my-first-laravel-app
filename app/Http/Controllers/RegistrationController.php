<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function index(){
        return view('form');
    }
    function register(Request $req){

        // $req->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password'=> 'required'
        // ]);
        print_r($req->all());
    }
    
}
