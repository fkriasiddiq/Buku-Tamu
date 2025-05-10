<?php
session_start();
require_once 'db.php';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) { // <- plaintext check
            $_SESSION['username'] = $username;
            echo json_encode(["success" => true]);
            header("Location: bukutamu.php");
        } else {
            echo json_encode(["success" => false, "error" => "Password salah"]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Username tidak ditemukan"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "error" => "Permintaan tidak valid"]);
}
?>
