<?php
session_start();
use helper\User;
require_once "../db.php";
require_once '../helper/User.php';
User::isAuth();
