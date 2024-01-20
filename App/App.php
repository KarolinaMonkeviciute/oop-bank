<?php

namespace Bank\App;

use Bank\App\Controllers\AccController;

class App
{
    static public function run(){
        $server = $_SERVER['REQUEST_URI'];
        $server = preg_replace('/\?.*$/', '', $server);
        $url = explode('/', $server);
        array_shift($url);

        return self::router($url);
    }

    static private function router($url){
        $method = $_SERVER['REQUEST_METHOD'];

        if($method == 'GET' && count($url) == 1 && $url[0] == 'accounts'){
            return (new AccController)->index($_GET);
        }
        if($method == 'GET' && count($url) == 1 && $url[0] == 'create'){
            return (new AccController)->create();
        }
        if($method == 'POST' && count($url) == 1 && $url[0] == 'store'){
            return (new AccController)->store($_POST);
        }
        if($method == 'POST' && count($url) == 2 && $url[0] == 'destroy'){
            return (new AccController)->destroy($url[1]);
        }
        if($method == 'GET' && count($url) == 2 && $url[0] == 'edit'){
            return (new AccController)->edit($url[1]);
        }
        if($method == 'POST' && count($url) == 2 && $url[0] == 'update'){
            return (new AccController)->update($url[1], $_POST);
        }
        if($method == 'GET' && count($url) == 2 && $url[0] == 'withdraw'){
            return (new AccController)->withdraw($url[1]);
        }
        if($method == 'POST' && count($url) == 2 && $url[0] == 'withdrawupd'){
            return (new AccController)->withdrawupd($url[1], $_POST);
        }

        return '<h1>404<h1>';
    }

    static public function view($view, $data=[]){
        extract($data);
        ob_start();
        require ROOT.'views/top.php';
        require ROOT."views/$view.php";
        require ROOT.'views/bottom.php';
        $content = ob_get_clean();
        return $content;

    }

    static public function redirect($url){
        header('Location: '.URL.'/'.$url);
        return null;
    }
}