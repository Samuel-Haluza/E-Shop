<?php
class Database {
    private $host = "localhost";
    private $db_name = "eshop_db";  // Názov tvojej databázy
    private $username = "root";     // Užívateľ
    private $password = "";         // Heslo
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Pripojenie zlyhalo: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>

