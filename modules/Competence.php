<?php

declare(strict_types=1);


class Competence
{

    /** @var int */
    private int $id;

    /** @var String */
    private String $Lib_comp;

    /**
     * Default constructor
     */
    public function __construct(int $id, String $Lib_comp)
    {
        $this->id = $id;
        $this->Lib_comp = $Lib_comp;
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
     * @return Collection<Competence>
     */
    public static function all()
    {
        // TODO implement here
        return null;
    }

    /**
     * @param int $id 
     * @return Competence|bool
     */
    public static function findById(PDO $conn,  int $id)
    {
        try {
            $query = "SELECT * FROM `COMPETENCE` WHERE  `id` = ?";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $id
            ]);

            if ($pdoS->rowCount() > 0) {
                $competence_row = $pdoS->fetch();
                return new self($competence_row->id, $competence_row->LIB_COMP);
            }

            return false;
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
        return null;
    }

    /**
     * @return [object Object]
     */
    public function module()
    {
        // TODO implement here
        return null;
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
     * Get the value of Lib_comp
     */
    public function getLib_comp()
    {
        return $this->Lib_comp;
    }

    /**
     * Set the value of Lib_comp
     *
     * @return  self
     */
    public function setLib_comp($Lib_comp)
    {
        $this->Lib_comp = $Lib_comp;

        return $this;
    }
}
