<?php
session_start();

use helper\User;

require_once '../../helper/User.php';

User::isAuth();
?>