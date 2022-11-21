<?php

include_once("../mysql/conexao.php");

$sql = "SELECT 
            *
        FROM
            paciente";
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
