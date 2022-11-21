<?php
require_once "../model/usuario.php";
require_once "../controller/usuarioController.php";

$usuarioController = new UsuarioController();

$usuarioController->login(
    $_POST['nome'],
    $_POST['senha']
);

if($usuarioController->autenticado) {
    // Cria session com dados necessários
    $_SESSION["usuario"] = $usuarioController->usuario;
}

?>