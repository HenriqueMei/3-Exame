<?php

include_once("../mysql/conexao.php");

$sql = 'UPDATE
            paciente
        SET
            nome = "' . $_POST["nome"] . '", sexo = ' . $_POST["sexo"] . ', endereco = "' . $_POST["endereco"] . '", bairro = "' . $_POST["bairro"] . '", 
            complemento = "' . $_POST["complemento"] . '", cep = "' . $_POST["cep"] . '", cidade = "' . $_POST["cidade"] . '", uf = "' . $_POST["uf"] . '", 
            nascimento = "' . $_POST["nascimento"] . '", telefone = "' . $_POST["telefone"] . '", email = "' . $_POST["email"] . '", peso = ' . $_POST["peso"] . ', 
            altura = ' . $_POST["altura"] . ', fuma = ' . $_POST["fumante"] . ', bebe = ' . $_POST["bebe"] . ', hipertensao = ' . $_POST["hipertensao"] . ', 
            diabete = ' . $_POST["diabetes"] . ', doenca_cardiaca = ' . $_POST["doenca_cardiaca"] . ', outras_doencas = "' . $_POST["outras_doencas"] . '", 
            medicacao = "' . $_POST["medicacoes"] . '"
        WHERE
            id_paciente = ' . $_POST["idPaciente"];
mysqli_query($mysqli, $sql);
