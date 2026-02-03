<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $start = null, $itensPage = null)
    {
        $sql = sprintf('SELECT * FROM %s ORDER BY id DESC', $table);

        if($start >= 0 && $itensPage > 0) {
            $sql .= " LIMIT {$start}, {$itensPage}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die("Ocorreu um erro ao tentar percorrer pelo banco de dados: {$e->getMessage()}");
        }
    }

    public function countAll($table)
    {
        $sql = "SELECT COUNT(*) FROM {$table}";

        try {

            $statement = $this->pdo->prepare($sql);

            $statement->execute();

            return intval($statement->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die("Ocorreu um erro ao tentar contar pelo banco de dados: {$e->getMessage()}");
        }
    }

    public function find($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table , implode(', ', array_keys($parameters)),
             ':' . implode(', :', array_keys($parameters))
        );

        try {
            $stnt = $this->pdo->prepare($sql);
            $stnt->execute($parameters);

        } catch (Exception $e) {
            die("Ocorreu um erro ao tentar inserir no banco de dados: {$e->getMessage()}");
        }
    }

    public function edit($table, $id, $parametros)
    {
        $sql = sprintf(
            'UPDATE %s 
            SET %s
            WHERE %s;',
            $table,
            implode(', ', array_map(function ($parametros) {
                return "{$parametros} = :{$parametros}";
            }, array_keys($parametros))),
            'id = :id'
        );

        $parametros['id'] = $id;

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parametros);
        } catch(Exception $e) {
            die("Ocorreu um erro ao tentar atualizar o banco de dados: {$e->getMessage()}");
        }
    }

    public function delete($table, $id)
    {
        $sql = sprintf(
            'DELETE FROM %s WHERE %s;',
            $table,
            "id = :id"
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute(compact('id'));
        } catch (Exception $e) {
            die("Ocorreu um erro ao tentar deletar no banco de dados: {$e->getMessage()}");
        }
    }

    public function busca($table, $pesquisa, $campo){
        $sql = "SELECT * FROM {$table} WHERE {$campo} LIKE '%$pesquisa%' ORDER BY id DESC";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $resultado = json_encode($result);
            return json_decode($resultado);

        } catch (Exception $e) {
            die("Ocorreu um erro ao tentar percorrer o banco de dados: {$e->getMessage()}");
        }
    }

    public function check($table, $email, $password)
    {
        $sql = sprintf('SELECT * FROM %s WHERE email = :email and password = :password', $table);

        try {
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die("Ocorreu um erro ao tentar comparar os dados: {$e->getMessage()}");
        }
    }
}