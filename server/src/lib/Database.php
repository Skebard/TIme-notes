<?php

class Database
{

    private $host;
    private $db;
    private $user;
    private $password;
    public $pdo;

    function __construct()
    {
        //create connection
        $this->host = HOST;
        $this->db = DATABASE;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->pdo = $this->connect();
    }

    private function connect()
    {
        $dsn = "mysql:host=" . $this->host . ';dbname=' . $this->db . ';';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $pdo = new PDO($dsn, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            if ($e->getCode() === 1049) {
                //create database
                $pdo = new PDO("mysql:host=" . $this->host . ';', $this->user, $this->password, $options);
                $query = file_get_contents(__DIR__ . "/databaseModel.sql");
                $pdo->exec($query);
            }
            return $pdo;
        }
    }
    /**
     * @param string $sql query with ? placeholders
     * @param array $params values of the ? in order
     * @return array values
     */
    public function execute(string $sql, array $params = [], bool $select=false)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $select? $stmt->fetchAll(): $stmt;
    }
}

