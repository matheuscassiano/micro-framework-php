<?php

namespace App\Model;

class PDOConnection
{

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
        $sql = "INSERT INTO " . $TABLE . " (name, email, message) VALUES (:name, :email, :msg)";
    
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
        $sql = "SELECT * FROM " . $TABLE;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

    public function update($TABLE, $ID_COLUMN, $req)
    {
        $conn = PDOConnection::getConnection();
        $sql = "UPDATE " . $TABLE . " SET name = :name, email = :email, message = :msg WHERE ".$ID_COLUMN." = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('id', $req['id']);
        $stmt->bindParam('name', $req['params']['name']);
        $stmt->bindParam('email', $req['params']['email']);
        $stmt->bindParam('msg', $req['params']['message']);

        if($stmt->execute()) {
            echo $req['id'] . ' atualizado com sucesso!';
        } else {
            echo 'Erro ao atualizar ' . $req['id'];
        }
    }

    public function delete($TABLE, $ID_COLUMN, $id)
    {
        $conn = PDOConnection::getConnection();
        $sql = "DELETE FROM ".$TABLE." WHERE " . $ID_COLUMN . " = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('id', $id);

        if($stmt->execute()) {
            echo $id . ' excluido com sucesso!';
        } else {
            echo 'Erro ao excluir ' . $id;
        }
    }
}
