<?php
    include '../src/conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']); // Защита от XSS
        $email = htmlspecialchars($_POST['email']); // Защита от XSS
        $rait = htmlspecialchars($_POST['rait']);   // Защита от XSS

        // 3. Подготовка и выполнение SQL-запроса
        try {
            $sql = "INSERT INTO reviews (name, email, rait) VALUES (:name, :email, :rait)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':rait', $rait);
            $stmt->execute();

            header('Location: ../index.php');
            exit();
        } catch (PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
        }
    } else {
        echo "Неверный метод запроса.";
    }
?>