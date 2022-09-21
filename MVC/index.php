<?php

require_once 'Controllers/MainController.php';

use Controllers\MainController;

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$url = rtrim($url, "/");
$urlObjects = explode('/', $url);

if ($urlObjects[1] == "MVC") {
    unset($urlObjects[1]);
    $urlObjects = array_values($urlObjects);
}
$size = sizeof($urlObjects);

if ($size === 1) {
    new MainController('home', $method);
} else {
    $correctUrlObjects = array_slice($urlObjects, 1);
    $correctUrl = implode('/', $correctUrlObjects);
    new MainController($correctUrl, $method);
}
