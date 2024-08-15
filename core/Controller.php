<?php

trait controller
{
    public function render($view, $pageData = [])
    {
        $controller = lcfirst(get_class($this));
        require_once "app/views/$controller/$view.view.php";
    }

    public function renderComponent($component, $componentData = [])
    {
        require "app/views/components/$component.view.php";
    }
}