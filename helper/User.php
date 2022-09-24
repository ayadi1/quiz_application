<?php

declare(strict_types=1);

namespace helper;

class User
{
    public static function isAuth()
    {
        if (!isset($_SESSION['isLoggedIn'])) {
            header('location:../login.php');
        }
    }
    public static function isFormateur()
    {
        if ($_SESSION['type'] != "formateur") {
            die('404');
        }
    }
}
