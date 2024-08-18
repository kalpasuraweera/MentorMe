<?php

class App
{
    private $controller = "Home";
    private $method = "index";

    private $openRoutes = [
        "home",
        "auth",
        "notfound",
        "unauthorized"
    ];

    public function route()
    {
        $url = $this->splitUrl();
        $this->controller = ucfirst($url[0]);

        // check if route is open or user is logged in and authorized
        if (!$this->isRouteOpen($this->controller)) {
            if (!isset($_SESSION['user'])) {
                header("Location:" . BASE_URL . "/auth/login");
                exit();
            } else if (!$this->checkAuthorization($_SESSION['user']['role'])) {
                header("Location:" . BASE_URL . "/unauthorized");
                exit();
            }
        }

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

        call_user_func_array([$controller, $this->method], [$url]);

    }

    private function splitUrl()
    {
        $url = isset($_GET['url']) && $_GET['url'] !== '' ? $_GET['url'] : 'home';
        $url = trim($url, '/');
        $url = explode('/', $url);
        return $url;
    }

    private function isRouteOpen($route)
    {
        return in_array(strtolower($route), $this->openRoutes);
    }

    private function checkAuthorization($role)
    {
        if ($this->controller === 'Coordinator' && $role !== 'coordinator') {
            return false;
        } else if ($this->controller === 'Supervisor' && $role !== 'supervisor' && $role !== 'supervisor_examiner') {
            return false;
        } else if ($this->controller === 'Examiner' && $role !== 'examiner' && $role !== 'supervisor_examiner') {
            return false;
        } else if ($this->controller === 'Student' && $role !== 'student') {
            return false;
        } else if ($this->controller === 'Stakeholder' && $role !== 'stakeholder') {
            return false;
        } else {
            return true;
        }
    }


}