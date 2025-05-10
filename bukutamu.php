<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
    <style>
         *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body{
            background-color: seagreen;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .box{
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }
        h1{
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .isi-form{
            margin-bottom: 15px;
        }
        label{
            display: block;
            margin-bottom: 5px;
            color: #404040;
        }
        input[type="text"], textarea{
            width: 100%;
            padding: 10px;
            border: 1px solid #A0A0A0;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea{
            resize: vertical;
            height: 100px;
        }
        input[type="submit"]{
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: #0069d9;
        }
        .log-box{
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }
        h2{
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .logout-btn {
            display: block;
            width: 100%;
            max-width: 200px;
            padding: 10px;
            background-color:rgb(234, 71, 87);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 5px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
    <script>
        function submitComment() {
            var form = document.getElementById("form");
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "komen.php", true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    form.reset();
                    loadComments(); // Refresh komentar
                }
            };
            xhr.send(formData);
            return false;
        }

        function loadComments() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_komen.php", true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    document.getElementById("comment-box").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        window.onload = loadComments;
    </script>
</head>
<body>
    <div class="box">
        <h1>Buku Tamu</h1>
        <form id="form" onsubmit="return submitComment();">
            <label>Nama:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="text" name="email" required>
            <label>Komentar:</label>
            <textarea name="comment" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="log-box">
        <h2>Log Book</h2>
        <div id="comment-box">Memuat komentar...</div>
    </div>

    <a href="logout.php" class="logout-btn">Logout</a>
</body>
</html>
