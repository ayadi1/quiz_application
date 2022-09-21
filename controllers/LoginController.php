<?php

class LoginController
{

    public function store(string $email, string $password, string $type, Db $db)
    {

        
        if ($type == "formateur") {
            $formateur = Formateur::login($db->connect(), $email, $password);
            
            
        } else {
            $staigaire = Stagiaire::login($db->connect(), $email, $password);
            
        }
    }
}
