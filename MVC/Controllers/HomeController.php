<?php
class HomeController{
    public string $base = "MVC";
    public function index(){
        include_once 'Views/Home.php';
    }
}
?>