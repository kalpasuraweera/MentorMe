<?php
session_start();
require_once "core/init.php";

$app = new App();
$app->route();