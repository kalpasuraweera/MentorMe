<?php

class App
{
    private $controller = "Home";
    private $method = "index";
    public function route()
    {
        $url = $this->splitUrl();
        $this->controller = ucfirst($url[0]);
        $filename = "app/controllers/$this->controller.php";
        if (file_exists($filename)) {
            require_once $filename;
        } else {
            $this->controller = "NotFound";
            require_once "app/controllers/NotFound.php";
        }
        $method = count($url) > 1 ? $url[1] : "index";
        $controller = new $this->controller;
        if (method_exists($controller, $method)) {
            $this->method = $method;
        }
        call_user_func_array([$controller, $this->method], $url);

    }

    private function splitUrl()
    {
        $url = isset($_GET['url']) && $_GET['url'] !== '' ? $_GET['url'] : 'home';
        $url = trim($url, '/');
        $url = explode('/', $url);
        return $url;
    }
}