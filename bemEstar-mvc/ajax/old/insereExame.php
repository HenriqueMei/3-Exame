<?php

include_once("../mysql/conexao.php");

// Insere o exame
$sql = "INSERT INTO 
            exame (_id_paciente, _id_usuario, data, colesterol, pressao, glicemia)
        VALUES 
            (" . $_POST["idPaciente"] . ", 3, NOW(), " . $_POST["colesterol"] . ", '" . $_POST["pressao_arterial"] . "', " . $_POST["glicemia"] . ")";
mysqli_query($mysqli, $sql);
$mysqli->close();
