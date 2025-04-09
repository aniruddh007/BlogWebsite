<?php
namespace Model ;

class Connection{
    private $conn;
    private $host = "localhost";
    private $username = "root"; 
    private $password = ""; 
    private $database = "blogs";

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>