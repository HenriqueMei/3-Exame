<?php
session_start();

require_once "../mysql/conexao.php";
require_once "../model/usuario.php";

class UsuarioController
{
    public $usuario;
    public $autenticado;

    public $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
        $this->autenticado = false;
    }

    public function login($nome, $senha)
    {
        $sql = "
            SELECT
                *
            FROM 
                usuario
            WHERE
                nome ='" . $nome . "'
            AND
                senha = MD5('" . $senha . "')";

        $resposta = mysqli_fetch_assoc(mysqli_query($this->conexao->mysqli, $sql));

        if ($resposta != [] && $resposta != null) {
            $this->autenticado = true;
            $this->usuario = new Usuario(
                $resposta["id_usuario"],
                $resposta["_id_curso"],
                $resposta["nome"],
                $resposta["nascimento"],
                $resposta["senha"],
                $resposta["perfil"],
                $resposta["status"]
            );
            $_SESSION["usuario"] = $resposta["id_usuario"];
            die($this->autenticado);
        }
    }
}
