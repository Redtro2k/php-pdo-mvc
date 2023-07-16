<?php
$pdo = require('config.php');
require('database/Connection.php');
return Connection::make($pdo['database']);
?>