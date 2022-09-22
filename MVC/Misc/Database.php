<?php

namespace MVC\Misc;

use PDO, PDOException;

class Database
{

    private string $host = "localhost";
    private string $db_name = "learn_laravel_3";
    private string $username = "root";
    private string $pwd = "";
    public string $table = '';
    public int $id;
    private ?PDO $conn;

    /**
     * @return PDO|null
     */
    public function connect(): ?PDO
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host .
                ';dbname=' . $this->db_name,
                $this->username,
                $this->pwd
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error:" . $e->getMessage();
        }

        return $this->conn;
    }

    /**
     * @return array|bool
     */
    public function all(): array|bool
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_OBJ) : false;
    }

    /**
     * @return object|false
     */
    public function single(): object|false
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ? $stmt->fetch(PDO::FETCH_OBJ) : false;
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ?? false;
    }

}
