<?php

trait controller
{
    public function render($view)
    {
        $controller = lcfirst(get_class($this));
        require_once "app/views/$controller/$view.view.php";
    }
}