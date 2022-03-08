<?php
namespace App;

use Database\DBConnect;

class App
{
    public $routes;
    public function run()
    {
       $this->resolve();
    }

    public function get($url,$callback)
    {
        $this->routes['get'][$url] = $callback;
    } 

    public function post($url,$callback)
    {
        $this->routes['post'][$url] = $callback;
    }

    public function resolve()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET")
        {
            if(array_key_exists($_SERVER['REQUEST_URI'],$this->routes['get']))
            {
                $user_func = $this->routes['get'][$_SERVER['REQUEST_URI']];
                $data = call_user_func($user_func);
                $this->render($data);
            }
        }

        else if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if(array_key_exists($_SERVER['REQUEST_URI'],$this->routes['post']))
            {
                $user_func = $this->routes['post'][$_SERVER['REQUEST_URI']];
                $data = call_user_func($user_func);
                echo $data;
            }
        }

        
    }

    public function render($data)
    {
        ob_start();
        foreach($data as $key => $item)
        {
            $$key = $item;
        }
        include __DIR__ . "/../view.php";
        $abc = ob_get_clean();
        echo $abc;
    }
}