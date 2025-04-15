<?php
// Класс Singleton
final class DatabaseConnection {
    // Единственный экземпляр класса
    private static ?DatabaseConnection $instance = null;

    // Данные соединения с базой данных
    private string $hostname = 'localhost';
    private string $databaseName = 'example_db';
    private string $username = 'admin';
    private string $password = 'password';

    // Запрещаем создание новых экземпляров извне
    private function __construct() {}

    // Предотвращаем клонирование
    private function __clone() {}

    // Глобальная точка доступа к экземпляру
    public static function getInstance(): DatabaseConnection {
        if (!isset(static::$instance)) {
            static::$instance = new static(); // статический оператор позволяет поддерживать late static binding
        }
        return static::$instance;
    }

    // Пример метода для демонстрации работы с базой данных
    public function connect(): void {
        echo "Подключаюсь к базе данных: $this->hostname/$this->databaseName.\n";
    }
}

// Использование класса Singleton
$connection1 = DatabaseConnection::getInstance();
$connection1->connect(); // Подключаюсь к базе данных: localhost/example_db.

// Проверка уникальности экземпляра
$connection2 = DatabaseConnection::getInstance();
var_dump($connection1 === $connection2); // bool(true)
