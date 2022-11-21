<?php

include_once("../mysql/conexao.php");

$sql = "SELECT
            *
        FROM
            paciente
        WHERE
            id_paciente = " . $_POST["idPaciente"];
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $selectSexo = '<option disabled>Selecione</option><option value="1" ' . ($row["sexo"] == '1' ? "selected" : "") . '>Masculino</option><option value="0" ' . ($row["sexo"] == '0' ? "selected" : "") . '>Feminino</option>';
        $selectHipertensao = '<option disabled>Selecione</option><option value="0" ' . ($row["hipertensao"] == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($row["hipertensao"] == '1' ? "selected" : "") . '>Sim</option>';
        $selectDiabete = '<option disabled>Selecione</option><option value="0" ' . ($row["diabete"] == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($row["diabete"] == '1' ? "selected" : "") . '>Sim</option>';
        $selectDoencaCardiaca = '<option disabled>Selecione</option><option value="0" ' . ($row["doenca_cardiaca"] == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($row["doenca_cardiaca"] == '1' ? "selected" : "") . '>Sim</option>';
        $selectFuma = '<option disabled>Selecione</option><option value="0" ' . ($row["fuma"] == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($row["fuma"] == '1' ? "selected" : "") . '>Sim</option>';
        $selectBebe = '<option disabled>Selecione</option><option value="0" ' . ($row["bebe"] == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($row["bebe"] == '1' ? "selected" : "") . '>Sim</option>';
        echo json_encode([
            "nome" => $row["nome"], "sexo" => $selectSexo, "endereco" => $row["endereco"], "bairro" => $row["bairro"], "complemento" => $row["complemento"],
            "cep" => $row["cep"], "cidade" => $row["cidade"], "uf" => $row["uf"], "nascimento" => $row["nascimento"], "telefone" => $row["telefone"],
            "email" => $row["email"], "peso" => $row["peso"], "altura" => $row["altura"], "fuma" => $selectFuma, "bebe" => $selectBebe,
            "hipertensao" => $selectHipertensao, "diabete" => $selectDiabete, "doenca_cardiaca" => $selectDoencaCardiaca, "outras_doencas" => $row["outras_doencas"],
            "medicacao" => $row["medicacao"]
        ]);
    }
}
