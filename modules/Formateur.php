<?php

declare(strict_types=1);


class Formateur
{

    /** @var int MLE    private int $MLE;

    /** @var string */
    private string $nom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return [object Object]
     */
    public function save()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function update()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        // TODO implement here
        return false;
    }

    /**
     * @return array
     */
    public static function all(): array
    {
        // TODO implement here
        return [];
    }

    /**
     * @return [object Object]
     */
    public static function findByMLE()
    {
        // TODO implement here
        return true;
    }

    /**
     * @return array
     */
    public function modules(): array
    {
        // TODO implement here
        return [];
    }

    // login

    public static function login(PDO $conn, string $email, string $password)
    {
        try {
            $query = "SELECT * FROM `FORMATEUR` WHERE `email` = ? ";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $email
            ]);
            if ($pdoS->rowCount() > 0) {
                $formateur_row = $pdoS->fetch();
                print_r($formateur_row);
                if ($formateur_row->password == $password) {
                    return Formateur::findByMLE($formateur_row->MLE);
                }
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
