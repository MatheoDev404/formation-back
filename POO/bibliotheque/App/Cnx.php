<?php

namespace App;

// Singleton
class Cnx
{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB_NAME = 'bibliotheque';

    /**
     * @var PDO
     */
    private static $instance;

    private function __construct() {}

    

    /**
     * Get the value of instance
     */ 
    public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new \PDO(
                'mysql:dbname=' . self::DB_NAME . ';host=' . self::HOST,
                self::USER,
                self::PASSWORD,
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            );
        }
        return self::$instance;
    }
}