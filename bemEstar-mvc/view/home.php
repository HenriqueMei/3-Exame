<?php
session_start();
if (!isset($_SESSION["usuario"])) 
    header("Location: ./login.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Bem Estar</title>
</head>

<body style="background-color: #edece6;">
    <header>
        <nav class="navbar navbar-expand-lg sticky-top bg-light">
            <div class="container-fluid">
                <a class="navbar-brand fs-4 fw-bold text-success" href="./home.php">Bem Estar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-success fw-semibold" aria-current="page" href="./home.php">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fw-semibold" href="./buscar.php">Buscar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fw-semibold" onclick="logout()">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-4 p-3 rounded bg-light">
        <div class="row">
            <div class="col-12">
                <span class="fw-bold text-success fs-5">Cadastrar Paciente</span>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12">
                <span class="fw-bold text-success fs-5">Identificação</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nome" placeholder="Nome">
                    <label for="nome">Nome</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nascimento" placeholder="Nascimento">
                    <label for="nascimento">Nascimento</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <select class="form-select" id="sexo" aria-label="Sexo">
                        <option selected value="">Selecione</option>
                        <option value="1">Masculino</option>
                        <option value="0">Feminino</option>
                    </select>
                    <label for="sexo">Sexo</label>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="endereco" placeholder="Endereço">
                    <label for="endereco">Endereço</label>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                    <label for="bairro">Bairro</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                    <label for="cidade">Cidade</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="uf" placeholder="Estado">
                    <label for="uf">Estado</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="complemento" placeholder="Complemento">
                    <label for="complemento">Complemento</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cep" placeholder="CEP">
                    <label for="cep">CEP</label>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefone" placeholder="Celular">
                    <label for="telefone">Celular</label>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12">
                <span class="fw-bold text-success fs-5">Dados Antropométricos</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="peso" placeholder="Peso(kg)">
                    <label for="peso">Peso(kg)</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="altura" placeholder="Altura(cm)">
                    <label for="altura">Altura(cm)</label>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12">
                <span class="fw-bold text-success fs-5">Dados Clínicos</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <select class="form-select" id="hipertensao" aria-label="Hipertensão">
                        <option selected value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                    <label for="hipertensao">Hipertensão</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <select class="form-select" id="diabetes" aria-label="Diabetes">
                        <option selected value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                    <label for="diabetes">Diabetes</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <select class="form-select" id="fumante" aria-label="Fumante">
                        <option selected value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                    <label for="fumante">Fumante</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <select class="form-select" id="bebe" aria-label="Bebe">
                        <option selected value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                    <label for="bebe">Bebe</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <select class="form-select" id="doenca_cardiaca" aria-label="Doença Cardíaca">
                        <option selected value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                    <label for="doenca_cardiaca">Doença Cardíaca</label>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="outras_doencas" placeholder="Outras Doenças">
                    <label for="outras_doencas">Outras Doenças</label>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="medicacoes" placeholder="Medicações em Uso">
                    <label for="medicacoes">Medicações em Uso</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="glicemia" placeholder="Glicemia (mg/dl)">
                    <label for="glicemia">Glicemia (mg/dl)</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="colesterol" placeholder="Colesterol">
                    <label for="colesterol">Colesterol (mg/dl)</label>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex">
                <div class="form-floating mb-3 w-50">
                    <input type="number" class="form-control" id="pressao_arterial" placeholder="Pressão Arterial">
                    <label for="pressao_arterial">Pressão Arterial</label>
                </div>
                <span class="mx-3 fs-3 align-self-center">X</span>
                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" id="mmhg" placeholder="mmHg">
                    <label for="mmhg">mmHg</label>
                </div>
            </div>
            <div class="col-12 col-lg-2 mb-3">
                <button type="button" class="form-control btn btn-lg btn-success fs-6" onclick="inserePaciente();">Salvar</button>
            </div>
            <div class="col-12 col-lg-2">
                <button type="button" class="form-control btn btn-lg btn-danger fs-6" onclick="cancelar();">Cancelar</button>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $("#nascimento").mask("00/00/0000");
            $("#cep").mask("00000-000");
            $("#peso").mask("000");
            $("#altura").mask("000");
            $("#telefone").mask("(00) 00000-0000");
        });

        // Logout
        function logout() {
            Swal.fire({
                text: 'Tem certeza que deseja sair?',
                icon: 'warning',
                confirmButtonText: 'Sim',
                showDenyButton: true,
                denyButtonText: 'Não',
                background: '#edece6',
                customClass: {
                    confirmButton: 'btn-success'
                }
            }).then(function(result) {
                if (result.isConfirmed)
                    window.location.href = "./login.php";
            });
        }

        function inserePaciente() {
            if ($("#nome").val() == "" ||
                $("#sexo").val() == "" ||
                $("#endereco").val() == "" ||
                $("#bairro").val() == "" ||
                $("#cep").val() == "" ||
                $("#cidade").val() == "" ||
                $("#uf").val() == "" ||
                $("#nascimento").val() == "" ||
                $("#telefone").val() == "" ||
                $("#email").val() == "" ||
                $("#peso").val() == "" ||
                $("#altura").val() == "" ||
                $("#fumante").val() == "" ||
                $("#bebe").val() == "" ||
                $("#hipertensao").val() == "" ||
                $("#diabetes").val() == "" ||
                $("#doenca_cardiaca").val() == "" ||
                $("#glicemia").val() == "" ||
                $("#colesterol").val() == "" ||
                $("#pressao_arterial").val() == "" ||
                $("#mmhg").val() == "") {
                Swal.fire({
                    title: 'Ops!',
                    text: 'Insira todos os dados',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else {
                var settings = {
                    url: '../ajax/pacienteAjax.php',
                    method: 'POST',
                    data: {
                        operacao: "inserirPacienteExame",
                        id_usuario: '<?= $_SESSION["usuario"] ?>',
                        nome: $("#nome").val(),
                        sexo: $("#sexo").val(),
                        endereco: $("#endereco").val(),
                        bairro: $("#bairro").val(),
                        complemento: $("#complemento").val(),
                        cep: $("#cep").val(),
                        cidade: $("#cidade").val(),
                        uf: $("#uf").val(),
                        nascimento: $("#nascimento").val(),
                        telefone: $("#telefone").val(),
                        email: $("#email").val(),
                        peso: $("#peso").val(),
                        altura: $("#altura").val(),
                        fumante: $("#fumante").val(),
                        bebe: $("#bebe").val(),
                        hipertensao: $("#hipertensao").val(),
                        diabetes: $("#diabetes").val(),
                        doenca_cardiaca: $("#doenca_cardiaca").val(),
                        outras_doencas: $("#outras_doencas").val(),
                        medicacoes: $("#medicacoes").val(),
                        glicemia: $("#glicemia").val(),
                        colesterol: $("#colesterol").val(),
                        pressao_arterial: $("#pressao_arterial").val() + 'x' + $("#mmhg").val()
                    },
                }
                $.ajax(settings).done(function(result) {
                    if (result == "erro") {
                        Swal.fire({
                            title: 'Ops!',
                            text: 'Telefone e/ou e-mail já cadastrados!',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                    } else {
                        Swal.fire({
                            text: 'Paciente cadastrado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        }).then(function() {
                            $("input").val("");
                        });
                    }
                });

            }
        }

        function cancelar() {
            $("input").val("");
        }
    </script>
</body>

</html>