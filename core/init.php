<?php

// require Models when needed
spl_autoload_register(function ($className) {
    require_once __DIR__ . "/../app/models/" . $className . ".php";
});

// Include the Mail class
require_once __DIR__ . "/Mail.php";

require_once "config.php";
require_once "App.php";
require_once "Controller.php";
require_once "Database.php";
require_once "Model.php";