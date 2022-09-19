<?php
{


}


require_once 'Models/Customer.php';

class CustomersController
{
    public string $base = "MVC";
    public function index():void
    {
        $data = (new Customer())->all();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        include_once 'Views/Customers.php';
    }

    public function registerView():void
    {
        include_once 'Views/Register.php';
    }

    public function register($data):void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $customer = new Customer();
        $customer->name = $_POST['name'];
        $customer->email = $_POST['email'];
        $customer->address = $_POST['address'];
        $customer->password = $_POST['password'];
        if ($customer->insert()) {
            $_SESSION['success'] = "Registration successful.";
        } else {
            $_SESSION['fail'] = "Registration successful";
        }

        $this->registerView();
    }
}