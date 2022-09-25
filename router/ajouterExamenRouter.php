<?php
session_start();

use helper\User;
use helper\Tools;

require_once "../db.php";
require_once '../helper/User.php';
require_once '../helper/Tools.php';
require_once '../controllers/ExamenController.php';

User::isAuth();

if (isset($_POST['title'])) {
    $examenController = new ExamenController();
    $examenController->store($_POST['title'], $_SESSION['id'], $_SESSION['addExamen']['competence']['id']);
    unset($_SESSION['addExamen']);
    Tools::Redirect('../dashboard/examen');
}
