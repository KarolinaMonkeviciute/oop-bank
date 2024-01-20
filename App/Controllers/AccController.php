<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use App\DB\FileBase;

class AccController
{
    public function create(){
        return App::view('create');
    }
    public function index($request){
        $writer = new FileBase('accounts');
        $accounts = $writer->showAll();

        $sort = $request['sort'] ?? null;
        if($sort == 'size-asc'){
            usort($accounts, fn($a, $b) => strnatcasecmp($a->lname, $b->lname));
            $sortValue = 'size-desc'; 
        }elseif($sort == 'size-desc'){
            usort($accounts, fn($a, $b) => strnatcasecmp($b->lname, $a->lname));
            $sortValue = 'size-asc'; 
        }else{
            $sortValue = 'size-desc'; 
        }

        return App::view('index', [
            'title' => 'Visos sąskaitos',
            'accounts' => $accounts,
            'sortValue' => $sortValue,
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

    public function destroy($id){
        $writer = new FileBase('accounts');
        $writer->delete($id);

        return App::redirect('accounts');
    }

    public function edit($id){
        $writer = new FileBase('accounts');
        $account = $writer->show($id);

        return App::view('add', [
            'title' => 'Pridėti lėšų',
            'account' => $account,
        ]);
    }

    public function update($id, $request){
        $add = $request['add'];
        $add = intval($add);    
        $writer = new FileBase('accounts');
        $account = $writer->show($id);
        $account->balance += $add;
        $writer->update($id, $account);
        return App::redirect('accounts'); 
    
    }
    public function withdraw($id){
        $writer = new FileBase('accounts');
        $account = $writer->show($id);

        return App::view('withdraw', [
            'title' => 'Nuskaičiuoti',
            'account' => $account,
        ]);
    }
    public function withdrawupd($id, $request){
        $withdraw = $request['withdraw'];
        $withdraw = intval($withdraw);    
        $writer = new FileBase('accounts');
        $account = $writer->show($id);
        $account->balance -= $withdraw;
        $writer->withdrawupd($id, $account);
        return App::redirect('accounts'); 
    
    }
}