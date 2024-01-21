<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use App\DB\FileBase;
use Bank\App\Message;

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

        if(strlen($fname) < 4 || strlen($lname) < 4){
            Message::get()->set('danger', 'Vardas ir pavardė turi būti ilgesni nei 3 simboliai');
            return App::redirect('create');
        }

        $writer = new FileBase('accounts');
        $accounts = $writer->showAll();

        foreach($accounts as $account){
            if($account->code == $code){
                Message::get()->set('danger', 'Sąskaita tokiu asmens kodu jau egzistuoja');
                return App::redirect('create');
            }
        }

        if(strlen($code) != 11){
            Message::get()->set('danger', 'Asmens kodą turi sudaryti 11 simbolių');
            return App::redirect('create');
        }

        if(substr($code, 0, 1) < 3 || (substr($code, 0, 1) > 6)){
            Message::get()->set('danger', 'Neteisingas asmens kodas');
            return App::redirect('create');
        }
        if(substr($code, 3, 1) > 1){
            Message::get()->set('danger', 'Neteisingas asmens kodas');
            return App::redirect('create');
        }
        
        
        $writer->create((object) [
            'fname' => $fname,
            'lname' => $lname,
            'number' => $number,
            'code' => $code,
            'balance' => 0,
        ]);
        Message::get()->set('success', 'Sąskaita sukurta');

        return App::redirect('accounts');
    }

    public function destroy($id){
        $writer = new FileBase('accounts');
        $account = $writer->show($id);
        if($account->balance != 0){
            Message::get()->set('danger', 'Negalima ištrinti sąskaitos kurioje yra lėšų');
            return App::redirect('accounts');
        }
        $writer->delete($id);
        Message::get()->set('danger', 'Sąskaita ištrinta');
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
        if($add < 0){
            Message::get()->set('danger', 'Negalima pridėti neigiamos sumos');
            return App::redirect('accounts'); 
        }
        $add = intval($add);    
        $writer = new FileBase('accounts');
        $account = $writer->show($id);
        $account->balance += $add;
        $writer->update($id, $account);

        Message::get()->set('info', 'Lėšos pridėtos');
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

        if($account->balance < $withdraw){
            Message::get()->set('danger', 'Negalima nuskaičiuoti daugiau nei esamas likutis');
            return App::redirect('accounts'); 
        }
        $account->balance -= $withdraw;
        $writer->withdrawupd($id, $account);

        Message::get()->set('info', 'Lėšos nuskaičiuotos');
        return App::redirect('accounts'); 
    }
}