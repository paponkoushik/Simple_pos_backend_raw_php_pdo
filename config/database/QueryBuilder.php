<?php

namespace App\Config\Database;

use Exception;
use PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function select($table, $parameter)
    {
        try {
            $statement = $this->pdo->prepare("select * from {$table} where id=:id");

            $statement->execute($parameter);

            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch(Exception $e) {
            echo $e;
        }

    }

    public function userSelect($query, $parameters)
    {
        try {
            $statement = $this->pdo->prepare("{$query}");

            $statement->execute($parameters);

            return $statement->fetchAll(PDO::FETCH_CLASS);

        } catch(Exception $e) {
            echo $e;
        }
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function query($query, $parameters)
    {
        try{
            $statement = $this->pdo->prepare("{$query}");

            $statement->execute($parameters);
        }catch(Exception $e) {
            echo $e;
        }
    }
}