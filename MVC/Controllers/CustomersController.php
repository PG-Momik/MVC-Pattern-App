<?php

require_once 'Models/Customer.php';
require_once 'Misc/Helper.php';
require_once 'Misc/Routes.php';

class CustomersController
{
    public function index(): void
    {
        $datas = (new Customer())->all();

        include_once 'Views/Customers.php';
    }

    public function register($data = '', $method = "GET"): void
    {
        if ($method != "GET") {
            session_suru();
            $customer = new Customer();
            $customer->name = $_POST['name'];
            $customer->email = $_POST['email'];
            $customer->address = $_POST['address'];
            $customer->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if ($this->validate(
                    $customer->name,
                    $customer->email,
                    $customer->address,
                    $customer->password
                ) and $customer->insert()) {
                $_SESSION['flashType'] = "success";
                $_SESSION['flashMsg'] = "Registration successful.";
            } else {
                $_SESSION['flashType'] = "danger";
                $_SESSION['flashMsg'] = "Registration unsuccessful";
            }
        }

        include_once 'Views/Register.php';
    }

    public function login($data = '', $method = "GET"): void
    {
        if ($method != "GET") {
            $isValid = $this->validate($_POST['email'], $_POST['password']);
            if ($isValid) {
                $customer = new Customer();
                $customer->email = $_POST['email'];
                $customer->password = $_POST['password'];
                $temp = $customer->getByEmail();
                if (password_verify($customer->password, $temp->password)) {
                    session_suru();
                    $_SESSION['userId'] = $temp->id;
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['flashType'] = "success";
                    $_SESSION['flashMsg'] = "Login successful";
                    header('location:' . Routes::BASE . Routes::PROFILE);
                }
                $_SESSION['flashType'] = "danger";
                $_SESSION['danger'] = "Login unsuccessful";
            }
        }
        include_once 'Views/Login.php';
    }

    public function profile(): void
    {
        session_suru();
        $customer = new Customer();
        $customer->id = $_SESSION['userId'];
        $data = $customer->single();
        include_once 'Views/Profile.php';
    }

    private function validate(...$datas): bool
    {
        foreach ($datas as $index => $data) {
            if (empty($data)) {
                return false;
            }
        }
        return true;
    }

    public function logout()
    {
        session_suru();
        unset($_SESSION['isLoggedIn']);
        unset($_SESSION['userId']);
        header("location:/MVC/");
    }
}