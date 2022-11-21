<?php

session_start();

include_once("./mysql/conexao.php");

$autenticado = false;

// Busca o email e a senha no banco de dados
$sql = "SELECT
            *
        FROM 
            usuario
        WHERE
            nome ='" . $_POST["nome"] . "'
        AND
            senha = MD5('" . $_POST["senha"] . "')";
if (mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["nome"] != null) {
    $autenticado = true;
    // Cria session com dados necessários
    $_SESSION["nome"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["nome"];
}

echo $autenticado;
