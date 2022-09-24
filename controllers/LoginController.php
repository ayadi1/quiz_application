<?php

use helper\Tools;

class LoginController
{

    private Db $db;
    public function __construct()
    {
        $this->db = new Db();
    }
    // public function store(string $email, string $password, string $type, Db $db)
    public function store(string $email, string $password, string $type)
    {



        if ($type == "formateur") {
            $formateur = Formateur::login($this->db->connect(), $email, $password);
            if ($formateur) {
                $_SESSION['id'] =  $formateur->getMLE();
                $_SESSION['type'] =  $type;
                $_SESSION['isLoggedIn'] =  true;
                Tools::Redirect('../dashboard/');
            }
            Tools::Redirect('../login.php');
        } else {
            $staigaire = Stagiaire::login($this->db->connect(), $email, $password);
            if ($staigaire) {
                print_r($staigaire);
                $_SESSION['id'] =  $staigaire->getCEF();
                $_SESSION['type'] =  $type;
                $_SESSION['isLoggedIn'] =  true;
                Tools::Redirect('../dashboard');
            }
            Tools::Redirect('../login.php');
        }
    }
}
