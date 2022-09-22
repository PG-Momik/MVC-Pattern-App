<?php

namespace MVC\Controllers;

error_reporting(1);

require_once 'Misc/Routes.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/CustomersController.php';
require_once 'Controllers/AboutController.php';

use MVC\Misc\Routes;
use MVC\Models\Customer;


class MainController
{

    public string $method = 'GET';
    public string $url = 'home';

    /**
     * @param string $url
     * @param string $method
     */
    public function __construct(string $url = 'home', string $method = "GET")
    {
        $this->url = $url;
        $this->method = $method;
        $this->redirect($url, $method);
    }

    /**
     * @param string $url
     * @param string $method
     * @return void
     */
    private function redirect(string $url, string $method): void
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
                    case Routes::DELETE:
                        (new CustomersController())->delete($_GET['id']);
                        break;
                    case Routes::LOGOUT:
                        (new CustomersController())->logout();
                        break;
                }
                break;
            case "POST":
                switch ($url) {
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
