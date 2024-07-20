<?php

class App
{
    private $controller = "Home";
    public function route()
    {
        $url = $this->splitUrl();
        $controller = ucfirst($url[0]);
        $filename = "app/controllers/$controller.php";
        if (file_exists($filename)) {
            require_once $filename;
        } else {
            $controller = "NotFound";
            require_once "app/controllers/NotFound.php";
        }
    }

    private function splitUrl()
    {
        $url = isset($_GET['url']) && $_GET['url'] !== '' ? $_GET['url'] : 'home';
        $url = trim($url, '/');
        $url = explode('/', $url);
        return $url;
    }
}