<?php
class Conexao
{
    private
        $server = "108.179.253.207",
        $user = "workou68_web",
        $password = "15C25v35l45l$",
        $database = "workou68_web";
    public
        $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->server, $this->user, $this->password, $this->database);
    }
}

$conexao = new Conexao();

if ($conexao->mysqli->connect_errno)
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " .  $mysqli->connect_error;
