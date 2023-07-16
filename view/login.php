<?php 
session_start();
    require('../model/UserModel.php');
    $pdo = require('../settings.php');
    $user = new UserModel($pdo);
    if(isset($_POST['login'])){
        $arr = [
            'username' => $_REQUEST['username'],
            'password' => $_REQUEST['password']
        ];
        $result = $user->userLogin($arr['username'], $arr['password']);
        $_SESSION['user_id'] = $result['id'];
        header('Location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Enter your Username"><br>
        <input type="password" name="password" placeholder="Enter your Password"><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>