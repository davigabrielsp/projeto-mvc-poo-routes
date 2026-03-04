<?php

namespace Config;

use PDO;
use PDOException;

class Database{
    private string $host = "localhost";
    private string $db_name = "crud_mvc";
    private string $username = "root";
    private string $password = "root";
    private ?PDO $conn = null;

    public function getConnection(): ?PDO {
        if($this->conn = null){
            return $this->conn;
        }

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }

        return $this->conn;
    }
}