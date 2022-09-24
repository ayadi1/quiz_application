<?php

declare(strict_types=1);


class Module
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $TITRE_MOD;
    private Db $db;

    /**
     * Default constructor
     */
    public function __construct(int $id, string $TITRE_MOD)
    {
        $this->id = $id;
        $this->TITRE_MOD = $TITRE_MOD;
        $this->db = new Db();
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
     * @return Collection
     */
    public function all()
    {
        // TODO implement here
        return null;
    }

    /**
     * @param  $id 
     * @return [object Object]
     */
    public static function findById(int $id, PDO $conn): Module | bool
    {
        try {
            $query = "SELECT * FROM `MODULE` WHERE `id` = ?";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $id
            ]);

            if ($pdoS->rowCount() > 0) {
                $module_row = $pdoS->fetch();
                return new self($module_row->id, $module_row->TITRE_MOD);
            }

            return false;
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
        return null;
    }

    /**
     * @return Collection<Formateur>
     */
    public function formateurs()
    {
        // TODO implement here
        return null;
    }
    public function getCompetence()
    {
        try {
            $query = "SELECT * FROM `COMPETENCE` WHERE `id_module` = ?";
            $pdoS = $this->db->connect()->prepare($query);

            $pdoS->execute([
                $this->id
            ]);
            $competence = $pdoS->fetchAll();
            return $competence;
        } catch (\Throwable $th) {
            print_r($th);
            return [];
        }
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of TITRE_MOD
     */
    public function getTITRE_MOD()
    {
        return $this->TITRE_MOD;
    }

    /**
     * Set the value of TITRE_MOD
     *
     * @return  self
     */
    public function setTITRE_MOD($TITRE_MOD)
    {
        $this->TITRE_MOD = $TITRE_MOD;

        return $this;
    }
}
