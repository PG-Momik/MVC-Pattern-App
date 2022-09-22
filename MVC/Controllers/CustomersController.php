<?php

namespace MVC\Controllers;

require_once 'Models/Customer.php';
require_once 'Misc/Helper.php';
require_once 'Misc/Routes.php';

use MVC\Misc\Helper;
use MVC\Misc\Routes;
use MVC\Models\Customer;

class CustomersController
{

    /**
     * @return void
     */
    public function index(): void
    {
        $datas = (new Customer())->all();

        include_once 'Views/Customers.php';
    }

    /**
     * @param array|null $data
     * @param string $method
     * @return void
     */
    public function register(array $data = null, string $method = "GET"): void
    {
        if ($method != "GET") {
            Helper::sessionSuru();
            $customer = new Customer();
            $customer->name = $data['name'];
            $customer->email = $data['email'];
            $customer->address = $data['address'];
            $customer->password = password_hash($data['password'], PASSWORD_DEFAULT);
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

    /**
     * @param array|null $data
     * @param string $method
     * @return void
     */
    public function login(array $data = null, string $method = "GET"): void
    {
        if ($method != "GET") {
            $isValid = $this->validate($_POST['email'], $_POST['password']);
            Helper::sessionSuru();
            if ($isValid) {
                $customer = new Customer();
                $customer->email = $data['email'];
                $customer->password = $data['password'];
                $temp = $customer->getByEmail();
                if (password_verify($customer->password, $temp->password)) {
                    $_SESSION['userId'] = $temp->id;
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['flashType'] = "success";
                    $_SESSION['flashMsg'] = "Login successful";
                    header('location:' . Routes::BASE . Routes::PROFILE);
                }
            }
            $_SESSION['flashType'] = "danger";
            $_SESSION['flashMsg'] = "Login unsuccessful";
        }
        include_once 'Views/Login.php';
    }

    /**
     * @return void
     */
    public function profile(): void
    {
        Helper::sessionSuru();
        $customer = new Customer();
        $customer->id = $_SESSION['userId'];
        $data = $customer->single();
        include_once 'Views/Profile.php';
    }

    /**
     * @param string ...$datas
     * @return bool
     */
    private function validate(string ...$datas): bool
    {
        foreach ($datas as $data) {
            if (empty($data)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        Helper::sessionSuru();
        unset($_SESSION['isLoggedIn']);
        unset($_SESSION['userId']);
        header("location:/MVC/");
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $customer = new Customer();
        $customer->id = $id;
        Helper::sessionSuru();
        if ($customer->delete()) {
            $_SESSION['flashType'] = "primary";
            $_SESSION['flashMsg'] = "Delete successful";
        } else {
            $_SESSION['flashType'] = "danger";
            $_SESSION['flashMsg'] = "Delete unsuccessful";
        }
        $this->index();
    }

}
