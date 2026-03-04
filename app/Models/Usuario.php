<?php

namespace App\Models;

use PDO;

class Usuario {
    private ?int $id = null;
    private string $nome;
    private string $email;
    private string $imagem;
    private PDO $conn;
    private string $table = "usuarios";

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getImagem(){
        return $this->imagem;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function setImagem(string $imagem){
        $this->imagem = $imagem;
    }

    public function all(){
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id){
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(): bool{
        $stmt = $this->conn->prepare(
            "INSERT INTO {$this->table} (nome, email, imagem)
            VALUES (:nome, :email, :imagem)"
        );

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":imagem", $this->imagem);

        return $stmt->execute();
    }

    public function update(int $id):bool {
        $stmt = $this->conn->prepare(
            "UPDATE {$this->table}
            SET nome =:nome, email=:email, imagem=:imagem WHERE id=:id"
        );

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":imagem", $this->imagem);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    public function delete(int $id){
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=:id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}