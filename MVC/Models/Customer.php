<?php

namespace Models;

require_once 'Misc/Database.php';

use Misc\Database;
use PDO;

class Customer extends Database
{

    public string $table = "Customers";
    public PDO $conn;
    public int $id;
    public string $name;
    public string $email;
    public string $address;
    public string $password;


    public function __construct()
    {
        $this->conn = $this->connect();
    }

    /**
     * @return bool
     */
    public function insert(): bool
    {
        $query = "INSERT INTO $this->table (name, email, address, password) VALUES (:name, :email, :address, :password)";
        $stmt = $this->conn->prepare($query);
        $params = array(
            ":name" => $this->name,
            ":email" => $this->email,
            ":address" => $this->address,
            ":password" => $this->password
        );

        return $stmt->execute($params) ?? false;
    }

    /**
     * @return mixed
     */
    public function getByEmail(): mixed
    {
        $query = "SELECT * from $this->table WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $params = array(
            'email' => $this->email,
        );
        $stmt->execute($params);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

}
