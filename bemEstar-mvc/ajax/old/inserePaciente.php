<?php

include_once("../mysql/conexao.php");

// Verifica se o e-mail já foj cadastrado
$sql = "SELECT 
            1
        FROM
            paciente
        WHERE
            (email = '" . $_POST["email"] . "' AND email IS NOT NULL)
        OR
            (telefone = '" . $_POST["telefone"] . "' AND telefone IS NOT NULL)";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) 
    die("erro");

// Insere novo paciente
$sql = "INSERT INTO
            paciente (nome, sexo, endereco, bairro, complemento, cep, cidade, 
                      uf, nascimento, telefone, email, peso, altura, fuma, 
                      bebe, hipertensao, diabete, doenca_cardiaca, outras_doencas, medicacao)
        VALUES
            ('" . $_POST["nome"] . "', '" . $_POST["sexo"] . "', '" . $_POST["endereco"] . "', '" . $_POST["bairro"] . "', '" . $_POST["complemento"] . "', '" . $_POST["cep"] . "', '" . $_POST["cidade"] . "', 
            '" . $_POST["uf"] . "', '" . $_POST["nascimento"] . "', '" . $_POST["telefone"] . "', '" . $_POST["email"] . "', " . $_POST["peso"] . ", " . $_POST["altura"] . ", " . $_POST["fumante"] . ",
            " . $_POST["bebe"] . ", " . $_POST["hipertensao"] . ", " . $_POST["diabetes"] . ", " . $_POST["doenca_cardiaca"] . ", '" . $_POST["outras_doencas"] . "', '" . $_POST["medicacoes"] . "')
        ";
mysqli_query($mysqli, $sql);

// Seleciona o id_paciente do paciente
$sql = "SELECT
            id_paciente
        FROM 
            paciente
        WHERE
            email = '" . $_POST["email"] . "'";
$result = $mysqli->query($sql);
$idPaciente = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idPaciente = $row["id_paciente"];
    }
}

// Insere o exame
$sql = "INSERT INTO 
            exame (_id_paciente, _id_usuario, data, colesterol, pressao, glicemia)
        VALUES 
            (" . $idPaciente . ", 3, NOW(), " . $_POST["colesterol"] . ", '" . $_POST["pressao_arterial"] . "', " . $_POST["glicemia"] . ")";
mysqli_query($mysqli, $sql);
$mysqli->close();
