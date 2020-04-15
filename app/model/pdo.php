<?php

namespace App\Model;

class PDOConnection
{
    private $pdo;

    public function getConnection()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'xa02ib';
        $dbName = 'Testes';
        try {
            $pdo = new \PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
            $pdo->exec("SET CHARACTER SET utf8");
            return $pdo;

        } catch (PDOException $ex) {
            echo 'Erro: ' . $ex->getMessage();
        }
    }

    public function create($TABLE, $req)
    {
        $conn = PDOConnection::getConnection();
        $sql = "INSERT INTO ".$TABLE." (name, email, message) VALUES (:name,:email,:msg)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('name', $req['name']);
        $stmt->bindParam('email', $req['email']);
        $stmt->bindParam('msg', $req['message']);

        if($stmt->execute()) {
            echo 'Enviado com sucesso!';
        } else {
            echo 'Erro ao executar';
        }
    }

    public function read($TABLE)
    {
        $conn = PDOConnection::getConnection();
        $sql = "SELECT * FROM ".$TABLE;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($result);
        echo ',';
    }

    public function update($TABLE, $req)
    {
        $conn = PDOConnection::getConnection();
        $sql = "UPDATE ".$TABLE." SET name = :name, email = :email, message = :msg WHERE id = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('id', $req['id']);
        $stmt->bindParam('name', $req['name']);
        $stmt->bindParam('email', $req['email']);
        $stmt->bindParam('msg', $req['message']);

        if($stmt->execute()) {
            echo 'Atualizado com sucesso!';
        } else {
            echo 'Erro ao atualizar';
        }
    }

    public function delete($TABLE, $id)
    {
        $conn = PDOConnection::getConnection();
        $sql = "DELETE FROM ".$TABLE." WHERE id = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('name', $id);

        if($stmt->execute()) {
            echo 'Excluido com sucesso!';
        } else {
            echo 'Erro ao excluir';
        }
    }

}
