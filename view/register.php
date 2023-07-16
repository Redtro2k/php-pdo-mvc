<?php 
    $pdo = require('../settings.php');
    require('../model/UserModel.php');
    $user = new UserModel($pdo);
    if(isset($_POST['add'])){
        $arr = [
            'name' => stripcslashes($_REQUEST['name']),
            'phone' => stripcslashes($_REQUEST['phone']),
            'status' => stripcslashes($_REQUEST['status']),
            'user' => stripcslashes($_REQUEST['user']),
            'password' => stripcslashes($_REQUEST['password'])
        ];
        $user->createUser($arr['name'], $arr['phone'], $arr['status'], $arr['user'], $arr['password']);
        header('Location: login.php');
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
        <div>
            <label>name</label>
            <input type="text" name="name" id="">
        </div>
        <br>
        <div>
            <label>phone</label>
            <input type="number" name="phone" id="">
        </div>
        <br>
        <div>
            <label>status</label>
            <br>
            Single<input type="radio" name="status" value="Single">
            Married<input type="radio" name="status" value="Married">
        </div>
        <br>
        <div>
            <label>Username</label>
            <input type="text" name="user">
        </div>
        <br>
        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <br>
        <div>
            <button type="submit" name="add">Register</button>
        </div>
    </form>
</body>
</html>