<?php

declare(strict_types=1);


class Formateur
{

    /** @var int MLE    */
    private int $MLE;

    /** @var string */
    private string $nom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /**
     * Default constructor
     */
    public function __construct(int $MLE, string $nom, string $email, string $password)
    {
        $this->MLE = $MLE;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
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
    public static function findByMLE(int $MLE)
    {
        // TODO implement here
        return $MLE;
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

                if ($formateur_row->password == $password) {
                    return new self(
                        $formateur_row->MLE,
                        $formateur_row->nom,
                        $formateur_row->email,
                        $formateur_row->password
                    );
                }
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of MLE
     */ 
    public function getMLE()
    {
        return $this->MLE;
    }

    /**
     * Set the value of MLE
     *
     * @return  self
     */ 
    public function setMLE($MLE)
    {
        $this->MLE = $MLE;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
