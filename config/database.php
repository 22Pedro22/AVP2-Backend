<?php

class Database {
    private static $instance = null;
    private $connection;
    
    private $host = 'localhost';
    private $database = 'transacoes_db';
    private $username = 'postgres';
    private $password = '88548582';
    
    private function __construct() {
        try {
            $this->connection = new PDO(
                "pgsql:host={$this->host};dbname={$this->database}",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
}
