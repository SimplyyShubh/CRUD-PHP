<?php

//PDO connection class if a connection to different Database Server is needed
class PDO_Connection
{
    private $server = "localhost";
    private $user = "root";
    private $pwd = "root";
    private $db = "crud_app";
    protected $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->server}; dbname={$this->db}; charset=utf8";
            $options = array(PDO::ATTR_PERSISTENT);
            $this->conn = new PDO($dsn, $this->user, $this->pwd, $options);
            echo "Connection Successfull";
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }
}
