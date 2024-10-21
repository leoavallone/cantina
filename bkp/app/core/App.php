<?php

namespace App\core;

class App {
    public function __construct()
    {
        $route = $this->parseURL();
        $controller = $this->getController($route);
        $method = $this->getMethod($route, $controller);
        $params = $this->getParams($route);

        call_user_func([$controller, $method], $params);
    }

    public function getController($route){
        $controller = $route[0] ?? "login";
        $controller = ucfirst($controller)."Controller";

        if(!file_exists("app/controllers/{$controller}.php")){{
            $controller = "ErrorController";
        }}

        require_once "app/controllers/{$controller}.php";

        return new $controller;
    }

    public function getMethod($route, $controller){
        $method = $route[1] ?? "index";
        if(!method_exists($controller, $method)){
            $method = "index";
        }

        return $method;
    }

    public function getParams($route){
        unset($route[0], $route[1]);
        return array_values($route);
    }

    public function parseURL(){
        $url = $_SERVER["REQUEST_URI"];
        $url = explode("/", $url);
        $url = array_filter($url);
        $url = array_values($url);

        return $url;
    }
}