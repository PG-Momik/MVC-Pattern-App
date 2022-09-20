<?php
error_reporting(1);
require_once 'Misc/Routes.php';
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
                    case Routes::HOME:
                        (new HomeController())->index();
                        break;
                    case Routes::ABOUT:
                        (new AboutController())->index();
                        break;
                    case Routes::CUSTOMERS:
                        (new CustomersController())->index();
                        break;
                    case Routes::REGISTER:
                        (new CustomersController())->register();
                        break;
                    case Routes::LOGIN:
                        (new CustomersController())->login();
                        break;
                    case Routes::PROFILE:
                        (new CustomersController())->profile();
                        break;
                    case Routes::LOGOUT:
                        (new CustomersController())->logout();
                        break;
                }
                break;
            case "POST":
                switch ($url) {
                    case Routes::HOME:
                        $data = $_POST;
                        (new HomeController())->show($data);
                        break;
                    case Routes::REGISTER:
                        (new CustomersController())->register($_POST, $method);
                        break;
                    case Routes::LOGIN:
                        (new CustomersController())->login($_POST, $method);
                        break;
                }
                break;
        }
    }
}