<?php
session_start();

require_once "../mysql/conexao.php";
require_once "../model/paciente.php";
require_once "../controller/exameController.php";


class PacienteController {
    public $conexao;
    
    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function buscarPacientes($nome, $filtro) {
        $sql = "
            SELECT 
                *
            FROM
                paciente";
        
        if($nome != "" || $filtro != "") {
            $sql .= "
            WHERE";
            
            if($nome != "") {
                $sql .= "
                nome LIKE '" . $nome . "%'" . ($filtro == "" ? "" : "
                AND ");
            }

            if($filtro != "") {
                $sql .= "
                " . $filtro . " = 1";
            }
        }

        $result = $this->conexao->mysqli->query($sql);

        $pacientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($pacientes, new Paciente(
                    $row["id_paciente"], $row["nome"], $row["sexo"],
                    $row["endereco"], $row["bairro"], $row["complemento"],
                    $row["cep"], $row["cidade"], $row["uf"],
                    $row["nascimento"], $row["telefone"], $row["email"],
                    $row["peso"], $row["altura"], $row["fuma"],
                    $row["bebe"], $row["hipertensao"], $row["diabete"],
                    $row["doenca_cardiaca"], $row["outras_doencas"], $row["medicacao"]
                ));
            }
        }

        return $pacientes;
    }

    public function retornarDadosPaciente($idPaciente) {
        $sql = "
        SELECT
            *
        FROM
            paciente
        WHERE
            id_paciente = " . $idPaciente;

        $result = $this->conexao->mysqli->query($sql);

        $pacientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($pacientes, new Paciente(
                    $row["id_paciente"], $row["nome"], $row["sexo"],
                    $row["endereco"], $row["bairro"], $row["complemento"],
                    $row["cep"], $row["cidade"], $row["uf"],
                    $row["nascimento"], $row["telefone"], $row["email"],
                    $row["peso"], $row["altura"], $row["fuma"],
                    $row["bebe"], $row["hipertensao"], $row["diabete"],
                    $row["doenca_cardiaca"], $row["outras_doencas"], $row["medicacao"]
                ));
            }
        }

        return $pacientes;
    }

    public function inserirPacienteExame(
        $idUsuario, $nome, $sexo,
        $endereco, $bairro, $complemento,
        $cep, $cidade, $uf,
        $nascimento, $telefone, $email,
        $peso, $altura, $fuma,
        $bebe, $hipertensao, $diabete,
        $doencaCardiaca, $outrasDoencas, $medicacao,
        $colesterol, $pressao, $glicemia
    ) {
        // Verifica se o e-mail já foj cadastrado
        $sql = "
        SELECT 
            1
        FROM
            paciente
        WHERE
            (email = '" . $email . "' AND email IS NOT NULL)
        OR
            (telefone = '" . $telefone . "' AND telefone IS NOT NULL)";
        
        $result = $this->conexao->mysqli->query($sql);

        if ($result->num_rows > 0) 
            die("erro");
        
        // Insere novo paciente
        $sql = "
        INSERT INTO paciente (
            nome, sexo, endereco, bairro, complemento, cep, cidade, 
            uf, nascimento, telefone, email, peso, altura, fuma, 
            bebe, hipertensao, diabete, doenca_cardiaca, outras_doencas, medicacao
        )
        VALUES
        (
            '" . $nome . "', '" . $sexo . "', '" . $endereco . "', '" . $bairro . "', '" . $complemento . "', '" . $cep . "', '" . $cidade . "', 
            '" . $uf . "', '" . $nascimento . "', '" . $telefone . "', '" . $email . "', " . $peso . ", " . $altura . ", " . $fuma . ",
            " . $bebe . ", " . $hipertensao . ", " . $diabete . ", " . $doencaCardiaca . ", '" . $outrasDoencas . "', '" . $medicacao . "'
        )";

        mysqli_query($this->conexao->mysqli, $sql);

        // Seleciona o id_paciente do paciente
        $sql = "
        SELECT
            id_paciente
        FROM 
            paciente
        WHERE
            email = '" . $email . "'";
        
        $result = $this->conexao->mysqli->query($sql);

        $idPaciente = "";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idPaciente = $row["id_paciente"];
            }
        }

        // Insere o exame
        $exameController = new ExameController();

        $exameController->inserirExame(
            $idPaciente, $idUsuario,
            $colesterol, $pressao,
            $glicemia
        );
    }

    public function editarPaciente(
        $idPaciente, $nome, $sexo,
        $endereco, $bairro, $complemento,
        $cep, $cidade, $uf,
        $nascimento, $telefone, $email,
        $peso, $altura, $fuma,
        $bebe, $hipertensao, $diabete,
        $doencaCardiaca, $outrasDoencas, $medicacao
    ) {
        $sql = '
        UPDATE
            paciente
        SET
            nome = "' . $nome . '", sexo = ' . $sexo . ', endereco = "' . $endereco . '", bairro = "' . $bairro . '", 
            complemento = "' . $complemento . '", cep = "' . $cep . '", cidade = "' . $cidade . '", uf = "' . $uf . '", 
            nascimento = "' . $nascimento . '", telefone = "' . $telefone . '", email = "' . $email . '", peso = ' . $peso . ', 
            altura = ' . $altura . ', fuma = ' . $fuma . ', bebe = ' . $bebe . ', hipertensao = ' . $hipertensao . ', 
            diabete = ' . $diabete . ', doenca_cardiaca = ' . $doencaCardiaca . ', outras_doencas = "' . $outrasDoencas . '", 
            medicacao = "' . $medicacao . '"
        WHERE
            id_paciente = ' . $idPaciente;
        
        mysqli_query($this->conexao->mysqli, $sql);
    }
}
?>