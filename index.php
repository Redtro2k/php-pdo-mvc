<?php 
$pdo = require('config.php');
require('database/Connection.php');
require('database/migration/UserTable.php');
require('database/migration/PostTable.php');
$pdo = Connection::make($pdo['database']);
UserTable::create($pdo);
PostTable::create($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="view/login.php">Login</a>|<a href="view/register.php">Register</a>
</body>
</html>