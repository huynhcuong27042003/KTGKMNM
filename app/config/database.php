<?php
class Database {
    private $host = "localhost";
    private $db_name = "test1";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8", 
                $this->username, 
                $this->password
            );
            // Thiết lập chế độ lỗi để báo lỗi khi có vấn đề
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }

        return $this->conn;
    }
}