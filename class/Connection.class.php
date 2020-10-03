<?php

class Connection {

    private $host = 'localhost';
    private $dbName = 'web_shop';
    private $user = 'root';
    private $pwd = '';

    private $conn;

    public function getConnection() {
        $this->conn = NULL;

        try {
            $this->conn = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbName, $this->user, $this->pwd);
            return $this->conn;
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}