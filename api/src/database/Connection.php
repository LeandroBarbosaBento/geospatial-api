<?php

namespace API\database;

class Connection
{
    private $host = 'localhost';
    private $dbname = 'quasar-space';
    private $username = 'postgres';
    private $password = '426351';

    public function connect()
    {
        try {
            $dsn = "pgsql:host={$this->host};dbname={$this->dbname};user={$this->username};password={$this->password}";
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];

            return new \PDO($dsn, $this->username, $this->password, $options);
        } catch (\PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
            exit;
        }
    }
}