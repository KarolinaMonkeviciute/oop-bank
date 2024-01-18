<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use App\DB\FileBase;

class AccController
{
    public function create(){
        return App::view('create');
    }
    public function index(){
        $writer = new FileBase('accounts');
        $accounts = $writer->showAll();
        return App::view('index', [
            'title' => 'Visos sąskaitos',
            'accounts' => $accounts,
        ]);
    }

    public function store($request){
        $fname = $request['fname'];
        $lname = $request['lname'];
        $number = $request['number'];
        $code = $request['code'];

        $writer = new FileBase('accounts');
        $writer->create((object) [
            'fname' => $fname,
            'lname' => $lname,
            'number' => $number,
            'code' => $code,
            'balance' => 0,
        ]);

        return App::redirect('accounts');
    }
}