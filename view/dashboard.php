<?php
    require('includes/sessions.php');
    $pdo = require('../settings.php');
    require('../model/UserModel.php');
    $user = new UserModel($pdo);
    $result = $user->signed($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Welcome back <?php echo $result['username']; ?>! </h3>
    <a href="../view/includes/logout.php">Logout</a>
    <p>Your Posts</p>
    <?php 
        include('Post/PostsIndex.php');
    ?>
</body>
</html>