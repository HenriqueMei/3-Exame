<?php

include_once("../mysql/conexao.php");

if ($_POST["nome"] != "" && $_POST["filtro"] != "") {
    $sql = "SELECT 
                *
            FROM
                paciente
            WHERE
                nome LIKE '" . $_POST["nome"] . "%'
            AND
                " . $_POST["filtro"] . " = 1";
} else if ($_POST["nome"] != "" && $_POST["filtro"] == "") {
    $sql = "SELECT 
                *
            FROM
                paciente
            WHERE
                nome LIKE '" . $_POST["nome"] . "%'";
} else if ($_POST["filtro"] != "" && $_POST["nome"] == "") {
    $sql = "SELECT 
                *
            FROM
                paciente
            WHERE
                " . $_POST["filtro"] . " = 1";
} else {
    $sql = "SELECT 
            *
            FROM
                paciente";
}

$result = $mysqli->query($sql);
$htmlTabela = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $htmlTabela .= '<tr>
                            <th scope="row">' . $row["id_paciente"] . '</th>
                            <td>' . $row["nome"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td onclick="editarPaciente(' . $row["id_paciente"] . ')"><span class="fw-semibold editar" style="cursor: pointer !important;">Editar</span></td>
                            <td onclick="inserirExame(' . $row["id_paciente"] . ')"><span class="fw-semibold editar" style="cursor: pointer !important;">Inserir exame</span></td>
                        </tr>';
    }
}
die($htmlTabela);
