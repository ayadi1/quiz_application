<?php
session_start();

use helper\User;

require_once '../helper/User.php';
User::isAuth();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="./examen/">examen</a></li>
        <li><a href="./logout.php">logout</a></li>
    </ul>
</body>

</html>