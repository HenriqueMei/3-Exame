<?php
session_start();

require_once "../mysql/conexao.php";


class ExameController {
    public $conexao;
    
    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserirExame($idPaciente, $idUsuario, $colesterol, $pressao, $glicemia) {
        $sql = "
        INSERT INTO exame (
            _id_paciente, _id_usuario, data, colesterol, pressao, glicemia
        )
        VALUES (
            " . $idPaciente . ", " . $idUsuario . ", NOW(), " . $colesterol . ", '" . $pressao . "', " . $glicemia . "
        )";

        mysqli_query($this->conexao->mysqli, $sql);
    }
}
?>