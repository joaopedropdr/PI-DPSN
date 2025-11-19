<?php
// Config/Database.php
class Database {
    private static $host = "127.0.0.1";
    private static $db   = "pi_dpsn";
    private static $user = "root";
    private static $pass = ""; // XAMPP padrão: senha vazia
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=utf8mb4";
                self::$conn = new PDO($dsn, self::$user, self::$pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                die("Erro de conexão com o banco: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
