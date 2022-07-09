<?php

//Generic Connection class to make connection to a Mysql Database using MySqli extension
class Connection
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbName = "crud_app" ;
    protected $connection;

    public function __construct()
    {
        // Create connection
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } 
        else return "Connected successfully";
    }
}
