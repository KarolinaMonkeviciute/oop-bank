<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use App\DB\FileBase;

class AccController
{
    public function create(){
        return App::view('create');
    }

    public function store($request){
        $fname = $request['fname'] ?? null;
        $lname = $request['lname'] ?? null;
        $number = $request['number'] ?? null;
        $code = $request['code'] ?? null;

        $writer = new FileBase('accounts');
    }
}