<?php 
    include '../src/conn.php';
    
    $sql = "SELECT id, joke, created_at FROM jokes ORDER BY RAND() LIMIT 1";

    try {
        $stmt = $pdo->query($sql, PDO::FETCH_ASSOC);
        $row = $stmt ? $stmt->fetch() : false;

        if ($row) {
            echo htmlspecialchars($row['joke'], ENT_QUOTES, 'UTF-8');
        } else {
            echo "<p>Нет доступных записей.</p>";
        }
    } catch (PDOException $e) {
        // обработка ошибки подключения или выполнения запроса
        echo "Ошибка: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }
?>

