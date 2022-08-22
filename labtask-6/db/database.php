<?php
const DB_HOST = 'localhost';
const DB_NAME = 'example';
const DB_USER = 'root';
const DB_PASS = '';
const DB_CHAR = 'utf8';

class Database
{
    protected static ?PDO $instance = null;

    protected function __construct() {}
    protected function __clone() {}

    public static function getInstance(): ?PDO
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => FALSE,
            );
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::getInstance(), $method), $args);
    }

    public static function run($sql, $args = []): bool|PDOStatement
    {
        if (!$args)
        {
            return self::getInstance()->query($sql);
        }
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}

