<?php
session_start();

require_once '../helper/User.php';
require_once '../helper/Tools.php';

use helper\User;
use helper\Tools;

require_once "../db.php";
require_once '../controllers/ExamenController.php';
User::isAuth();

if (isset($_POST['module'])) {
    $examenController = new ExamenController();
    $examenController->selectModule($_POST['module']);
    Tools::Redirect('../dashboard/examen/add.php');
}
