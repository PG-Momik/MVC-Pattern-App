<?php

//require_once '../Misc/Routes.php';
require_once 'HomeController.php';
require_once 'CustomersController.php';
require_once 'AboutController.php';

class MainController
{
    public string $method = 'GET';
    public string $url = 'home';

    public function __construct($url = 'home', $method = "GET")
    {
        $this->url = $url;
        $this->method = $method;
        $this->redirect($url, $method);
    }

    private function redirect($url, $method): void
    {
        switch ($method) {
            case "GET":
                switch ($url) {
                    case "home":
                        (new HomeController())->index();
                        break;
                    case "aboutus":
                        (new AboutController())->index();
                        break;
                    case "customers":
                        (new CustomersController())->index();
                        break;
                    case "customers/register":
                        (new CustomersController())->registerView();
                        break;
                }
                break;
            case "POST":
                switch ($url) {
                    case "home":
                        $data = $_POST;
                        (new HomeController())->show($data);
                        break;
                    case 'customers/register':
                        (new CustomersController())->register($_POST);
                        break;
                }
                break;
        }
    }
}