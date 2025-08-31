<?php
    include '../src/conn.php';

    header('Content-Type: application/json; charset=utf-8');

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

        echo json_encode(['success' => true, 'message' => 'Отправлено успешно.']);
            exit();
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Ошибка выполнения запроса: ' . $e->getMessage()]);
            exit();
        }
    } else {
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Неверный метод запроса.']);
        exit();
    }

?>


<script src="controllers/insert_form.js"></script>