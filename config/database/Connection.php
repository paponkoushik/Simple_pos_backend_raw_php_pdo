<?php
namespace App\Config\Database;

use PDO;
use PDOException;

class Connection
{
    public static function make($config): PDO
    {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}