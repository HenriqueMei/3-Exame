<?php
require_once "../model/exame.php";
require_once "../controller/exameController.php";

$exameController = new ExameController();

$exameController->inserirExame(
    $_POST['idPaciente'],
    $_POST['idUsuario'],
    $_POST['colesterol'],
    $_POST['pressao_arterial'],
    $_POST['glicemia']
);

?>