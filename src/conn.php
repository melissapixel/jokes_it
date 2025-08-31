<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        // Подключение к серверу без указания БД
        $pdo = new PDO($dsn, $user, $pass, $options);

        // 1) CREATE DATABASE IF NOT EXISTS jokes_db;
        $pdo->exec("CREATE DATABASE IF NOT EXISTS jokes_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        // 2) USE jokes_db;
        $pdo->exec("USE jokes_db");

        // 3) CREATE TABLE IF NOT EXISTS jokes (...);
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS jokes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                joke TEXT NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )
        ");

        $pdo->exec("
        CREATE TABLE IF NOT EXISTS reviews (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            rait TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ");

    } catch (PDOException $e) {
        // вывод сообщения об ошибке
        echo "Ошибка: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>