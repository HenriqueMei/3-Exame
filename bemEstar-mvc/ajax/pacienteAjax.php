<?php
require_once "../model/paciente.php";
require_once "../controller/pacienteController.php";

$pacienteController = new PacienteController();

switch($_POST['operacao']) {
    case "buscarPacientes":
        $pacientes = $pacienteController->buscarPacientes($_POST['nome'], $_POST['filtro']);

        $htmlTabela = "";

        if ($pacientes != null && $pacientes != []) {
            foreach($pacientes as $atual) {
                $htmlTabela .= '
                <tr>
                    <th scope="row">' . $atual->idPaciente . '</th>
                    <td>' . $atual->nome . '</td>
                    <td>' . $atual->email . '</td>
                    <td onclick="editarPaciente(' . $atual->idPaciente . ')"><span class="fw-semibold editar" style="cursor: pointer !important;">Editar</span></td>
                    <td onclick="inserirExame(' . $atual->idPaciente . ')"><span class="fw-semibold editar" style="cursor: pointer !important;">Inserir exame</span></td>
                </tr>';
            }
        }

        die($htmlTabela);
        break;
    case "retornarDadosPaciente":
        $paciente = $pacienteController->retornarDadosPaciente($_POST['idPaciente']);

        if ($paciente != null && $paciente != []) {
            foreach($paciente as $atual) {
                $selectSexo = '<option disabled>Selecione</option><option value="1" ' . ($atual->sexo == '1' ? "selected" : "") . '>Masculino</option><option value="0" ' . ($atual->sexo == '0' ? "selected" : "") . '>Feminino</option>';
                $selectHipertensao = '<option disabled>Selecione</option><option value="0" ' . ($atual->hipertensao == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($atual->hipertensao == '1' ? "selected" : "") . '>Sim</option>';
                $selectDiabete = '<option disabled>Selecione</option><option value="0" ' . ($atual->diabete == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($atual->diabete == '1' ? "selected" : "") . '>Sim</option>';
                $selectDoencaCardiaca = '<option disabled>Selecione</option><option value="0" ' . ($atual->doencaCardiaca == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($atual->doencaCardiaca == '1' ? "selected" : "") . '>Sim</option>';
                $selectFuma = '<option disabled>Selecione</option><option value="0" ' . ($atual->fuma == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($atual->fuma == '1' ? "selected" : "") . '>Sim</option>';
                $selectBebe = '<option disabled>Selecione</option><option value="0" ' . ($atual->bebe == '1' ? "selected" : "") . '>Não</option><option value="1" ' . ($atual->bebe == '1' ? "selected" : "") . '>Sim</option>';

                echo json_encode([
                    "nome" => $atual->nome, "sexo" => $selectSexo, "endereco" => $atual->endereco, "bairro" => $atual->bairro, "complemento" => $atual->complemento,
                    "cep" => $atual->cep, "cidade" => $atual->cidade, "uf" => $atual->uf, "nascimento" => $atual->nascimento, "telefone" => $atual->telefone,
                    "email" => $atual->email, "peso" => $atual->peso, "altura" => $atual->altura, "fuma" => $selectFuma, "bebe" => $selectBebe,
                    "hipertensao" => $selectHipertensao, "diabete" => $selectDiabete, "doenca_cardiaca" => $selectDoencaCardiaca, "outras_doencas" => $atual->outrasDoencas,
                    "medicacao" => $atual->medicacao
                ]);
            }
        }
        break;
    case "inserirPacienteExame":
        $pacienteController->inserirPacienteExame(
            $_POST['id_usuario'], $_POST['nome'], $_POST['sexo'], 
            $_POST['endereco'], $_POST['bairro'], $_POST['complemento'], 
            $_POST['cep'], $_POST['cidade'], $_POST['uf'], 
            $_POST['nascimento'], $_POST['telefone'], $_POST['email'], 
            $_POST['peso'], $_POST['altura'], $_POST['fumante'], 
            $_POST['bebe'], $_POST['hipertensao'], $_POST['diabetes'], 
            $_POST['doenca_cardiaca'], $_POST['outras_doencas'], $_POST['medicacoes'], 
            $_POST['colesterol'], $_POST['pressao_arterial'], $_POST['glicemia']
        );
        break;
    case "editarPaciente":
        $pacienteController->editarPaciente(
            $_POST['idPaciente'], $_POST['nome'], $_POST['sexo'], 
            $_POST['endereco'], $_POST['bairro'], $_POST['complemento'],  
            $_POST['cep'], $_POST['cidade'], $_POST['uf'], 
            $_POST['nascimento'], $_POST['telefone'], $_POST['email'],
            $_POST['peso'], $_POST['altura'], $_POST['fumante'],
            $_POST['bebe'], $_POST['hipertensao'], $_POST['diabetes'], 
            $_POST['doenca_cardiaca'], $_POST['outras_doencas'], $_POST['medicacoes']
        );
        break;
}
