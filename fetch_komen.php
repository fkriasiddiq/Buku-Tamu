<?php
require 'db.php';

$result = $conn->query("SELECT name, comment, email FROM comments ORDER BY id DESC");

while($row = $result->fetch_assoc()) {
    echo "<p><strong>Pengirim:</strong> " . htmlspecialchars($row['name']) . "<br>";
    echo "<strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>";
    echo "<strong>Komentar:</strong><br>" . nl2br(htmlspecialchars($row['comment'])) . "</p><hr>";
}
?>
