<?php

namespace Bank\App;

use Bank\App\Controllers\AccController;

class App
{
    static public function run(){
        $server = $_SERVER['REQUEST_URI'];
        $url = explode('/', $server);
        array_shift($url);

        return self::router($url);
    }

    static private function router($url){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET' && count($url) == 1 && $url[0] == 'create'){
            return (new AccController)->create();
        }
        if($method == 'POST' && count($url) == 1 && $url[0] == 'store'){
            return (new AccController)->store($_POST);
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
}