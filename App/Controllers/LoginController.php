<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use Bank\App\Auth;
use Bank\App\Message;

class LoginController
{
    public function index(){
        return App::view('auth/login');
    }
    
    public function login($request){
        $email = $request['email'] ?? '';
        $password = $request['password'] ?? '';

        if(Auth::get()->tryLoginUser($email, $password)){
            return App::redirect('accounts');
        }
        Message::get()->set('danger', 'Neteisingas el. paštas arba slaptažodis');
        return App::redirect('login');
    }

    public function logout(){
        Auth::get()->logout();
        return App::redirect('login');
    }
}
