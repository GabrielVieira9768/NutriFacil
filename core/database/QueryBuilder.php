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

        if ($start >= 0 && $itensPage > 0) {
            $sql .= " LIMIT {$start}, {$itensPage}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die("Ocorreu um erro ao tentar percorrer o banco de dados: {$e->getMessage()}");
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
            die("Ocorreu um erro ao tentar contar no banco de dados: {$e->getMessage()}");
        }
    }

    public function find($table, $id)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
            $statement->execute(['id' => $id]);

            return $statement->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            die("Erro ao buscar registro: {$e->getMessage()}");
        }
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

        } catch (Exception $e) {
            die("Erro ao inserir no banco de dados: {$e->getMessage()}");
        }
    }

    public function edit($table, $id, $parametros)
    {
        $sql = sprintf(
            'UPDATE %s SET %s WHERE id = :id',
            $table,
            implode(', ', array_map(function ($campo) {
                return "{$campo} = :{$campo}";
            }, array_keys($parametros)))
        );

        $parametros['id'] = $id;

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parametros);

        } catch (Exception $e) {
            die("Erro ao atualizar o banco de dados: {$e->getMessage()}");
        }
    }

    public function delete($table, $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE id = :id', $table);

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute(compact('id'));

        } catch (Exception $e) {
            die("Erro ao deletar no banco de dados: {$e->getMessage()}");
        }
    }

    public function busca($table, $pesquisa, $campo)
    {
        $sql = "SELECT * FROM {$table} WHERE {$campo} LIKE :pesquisa ORDER BY id DESC";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'pesquisa' => "%{$pesquisa}%"
            ]);

            return $statement->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die("Erro na busca: {$e->getMessage()}");
        }
    }

    public function check($table, $email, $password)
    {
        $sql = sprintf(
            'SELECT * FROM %s WHERE email = :email AND password = :password',
            $table
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die("Erro ao comparar dados: {$e->getMessage()}");
        }
    }

    public function raw($sql, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);

            return $statement->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die("Erro na query personalizada: {$e->getMessage()}");
        }
    }
}