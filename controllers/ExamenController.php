<?php
class ExamenController
{
    private Db $db;
    public function __construct()
    {
        $this->db = new Db();
    }
    public function selectModule(int $id_module)
    {
        unset($_SESSION['addExamen']['modules']);
        $_SESSION['addExamen']['modules']['id'] = $id_module;
    }
    public function deleteSelectedModule()
    {
        unset($_SESSION['addExamen']['modules']);
    }
    public function selectCompetence(int $id_competence)
    {
        unset($_SESSION['addExamen']['competence']);
        $_SESSION['addExamen']['competence']['id'] = $id_competence;
    }
    public function deleteSelectedCompetence()
    {
        unset($_SESSION['addExamen']['competence']);
    }
    public function store(string $title, int $id_formateur, int $id_competence)
    {
        try {
            $query = "INSERT INTO `EXAMEN`( `id_competence`, `id_formatuer`, `title`) VALUES (?,?,?)";
            $pdoS = $this->db->connect()->prepare($query);

            $pdoS->execute([
                $id_competence,
                $id_formateur,
                $title
            ]);
            return true;
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }
}
