<?php

namespace Controllers;

class HomeController
{
    /**
     * @return void
     */
    public function index(): void
    {
        include_once 'Views/Home.php';
    }
}

