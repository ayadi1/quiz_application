<?php

declare(strict_types=1);


class ModuleAssurer
{

    /**
     * Default constructor
     */
    private int $id_formateur;
    private int $id_module;
    private int $id_group;
    public function __construct()
    {
        // ...
    }

    /**
     * 
     */
    public function save()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function update()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function delete()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public static function all()
    {
        // TODO implement here
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
     * @return [object Object]
     */
    public function group()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function formateur()
    {
        // TODO implement here
        return null;
    }
    public static function getModulesByMLE(PDO $conn,  int $mle)
    {
        try {
            $query = "SELECT MO.id,MO.TITRE_MOD FROM `ModuleAssurer`  MS
            INNER JOIN MODULE MO 
            on MO.id = MS.id_module
            WHERE MS.id_formatuer = ? ";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $mle
            ]);
            $modules = $pdoS->fetchAll();
            return $modules;
        } catch (\Throwable $th) {
            print_r($th);
            return [];
        }
    }

    /**
     * Get default constructor
     */ 
    public function getId_formateur()
    {
        return $this->id_formateur;
    }

    /**
     * Set default constructor
     *
     * @return  self
     */ 
    public function setId_formateur($id_formateur)
    {
        $this->id_formateur = $id_formateur;

        return $this;
    }

    /**
     * Get the value of id_module
     */ 
    public function getId_module()
    {
        return $this->id_module;
    }

    /**
     * Set the value of id_module
     *
     * @return  self
     */ 
    public function setId_module($id_module)
    {
        $this->id_module = $id_module;

        return $this;
    }

    /**
     * Get the value of id_group
     */ 
    public function getId_group()
    {
        return $this->id_group;
    }

    /**
     * Set the value of id_group
     *
     * @return  self
     */ 
    public function setId_group($id_group)
    {
        $this->id_group = $id_group;

        return $this;
    }
}
