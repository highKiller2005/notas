<?php
    declare(strict_types = 1);

    define('DB_HOST', "localhost");
    define('DB_USER', "root");
    define('DB_PASS', "root");
    define('DB_NAME', "thiago_kaua");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach($_POST as $key => $value) {
            $$key = $value;
        }
    }

    function assert_key_exists(array $keys, array $array): bool {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $array)) {
                return false;
            }
        }

        return true;
    }

    class Database {
        private $conn;

        public function __construct() {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            if ($this->conn->connect_error) {
                die("Conexão falhou: " . $this->conn->connect_error);
            }
        }

        public function getConnection(): mysqli {
            return $this->conn;
        }

        public function query(string $sql): mysqli_result | bool | null {
            $response = null;

            try {
                $response = $this->conn->query($sql);
            } catch (\PDOException $e) {
                header("500 Internal Server Error");
                die($e->getMessage());
            }

            return $response;
        }

        public function get_many(string $table): array {
            $data = array();
            
            $result = $this->query("SELECT * FROM $table");

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            return $data;
        }

        public function get_one(string $table, string | int $id):?array {
            $result = $this->query("SELECT * FROM $table WHERE $id = '$id'");

            $row = $result->fetch_assoc();
            return $row;
        }

        public function close(): void {
            $this->conn->close();
        }
    }
?>