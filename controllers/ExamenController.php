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
}
