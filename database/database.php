<?php
class Database {
    protected $pdo;

    private $host = 'localhost';      // The hostname of the database server.
    private $username = 'root';       // The username used to connect to the database.
    private $password = '';           // The password used to connect to the database (empty string means no password).
    private $dbname = 'paynet';    // The name of the database to connect to.

    public function __construct() {
        if ($this->pdo === null){
            try {
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }
}
?>
