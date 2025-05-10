<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    http_response_code(403);
    exit("Unauthorized");
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$comment = htmlspecialchars($_POST['comment']);

$stmt = $conn->prepare("INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $comment);
$stmt->execute();
echo "Sukses";
?>
