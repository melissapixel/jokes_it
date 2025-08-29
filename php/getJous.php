<?php 

    $sql = "SELECT id, joke, created_at FROM jokes ORDER BY RAND() LIMIT 1;";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetch();

    if ($row) {
        echo htmlspecialchars($row['joke']);
    } else {
        echo "<p>Нет доступных записей.</p>";
    }
?>