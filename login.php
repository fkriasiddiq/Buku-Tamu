<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body{
            background-color:seagreen;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .box{
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1{
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .username, .password{
            position: relative;
            margin-bottom: 15px;
        }
        label{
            display: block;
            margin-top: 5px;
            margin-bottom: 5px;
            color: #404040;
        }
        input[type="text"], input[type="password"]{
            width: 100%;
            padding: 10px;
            border: 1px solid #A0A0A0;
            border-radius: 4px;
            font-size: 16px;
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
            margin-top: 15px;
        }
        input[type="submit"]:hover{
            background-color: #0069d9;
        }
        .error{
            color: #dc3545;
            text-align: center;
            margin-bottom: 15px;
        }
</style>
</head>
<body>
    <div class="box">
        <h1>Buku Tamu</h1>
        <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
        ?>
        <form method="post" action="action_login.php">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
