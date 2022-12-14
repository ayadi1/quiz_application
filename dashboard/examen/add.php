<?php
session_start();


require_once '../../helper/User.php';
require_once '../../modules/ModuleAssurer.php';
require_once '../../modules/Module.php';
require_once '../../modules/Competence.php';
require_once '../../controllers/ExamenController.php';

require_once '../../db.php';

use helper\User;

User::isAuth();
User::isFormateur();

$db = new Db();
$view = 1;
$module = null;
$competences = null;
$competence = null;
if (!isset($_SESSION['addExamen']['modules']['id'])) {
    $view = 1;
} elseif (!isset($_SESSION['addExamen']['competence']['id'])) {
    $view = 2;
    $module = Module::findById($_SESSION['addExamen']['modules']['id'], $db->connect());
    if (!$module) {
        unset($_SESSION['addExamen']['modules']);
    } else {
        $competences = $module->getCompetence();
    }
} else {
    $view = 3;
    $module = Module::findById($_SESSION['addExamen']['modules']['id'], $db->connect());
    $competence = Competence::findById($db->connect(),  $_SESSION['addExamen']['competence']['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
    <!--!!  cdl links  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">

        <?php if ($view == 1) :  ?>
            <form action="../../router/selectModuleRouter.php" method="post">
                <div class="form-group">
                    <label for="exampleSelect">sélectionner un module</label>
                    <select class="form-control" id="module" name="module" required>
                        <?php foreach (ModuleAssurer::getModulesByMLE($db->connect(), $_SESSION['id']) as $module) : ?>
                            <option value='<?= $module->id ?>'><?= $module->TITRE_MOD ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-primary">select</button>
            </form>
        <?php
        elseif ($view == 2) : ?>
            selected module : <?= $module->getTITRE_MOD() ?>
            <form action="../../router/deleteSelectedModule.php" method="post">
                <input type="submit" class="btn btn-danger" value="désélectionner module" name="delete">
            </form>
            <br><br>
            <form action="../../router/selectCompetence.php" method="post">
                <div class="form-group">
                    <label for="exampleSelect">sélectionner un competence</label>
                    <select class="form-control" id="competence" name="competence" required>
                        <?php foreach ($competences as $competence) :
                        ?>
                            <option value="<?= $competence->id ?>"><?= $competence->LIB_COMP ?></option>
                        <?php endforeach;
                        ?>
                    </select>
                    <button class="btn btn-primary">select</button>
                </div>
            </form>
        <?php else : ?>
            selected module : <?= $module->getTITRE_MOD() ?>
            <br>
            selected competence : <?= $competence->getLib_comp() ?>
            <form action="../../router/deleteSelectedCompetence.php" method="post">
                <input type="submit" class="btn btn-danger" value="désélectionner competence" name="delete">
            </form>
            <!-- add exam -->
            <form action="../../router/ajouterExamenRouter.php" method="post">
                <div class="form-group">
                    <label for="title">title :</label>
                    <input type="text" class="form-control" id="title" required name="title">
                </div>
                <button class="btn btn-primary">ajouter</button>
            </form>
        <?php endif ?>


    </div>
</body>

</html>