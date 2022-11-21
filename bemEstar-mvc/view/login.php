<?php
session_start();
$_SESSION = array(); // Limpa a session
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
    <link rel="stylesheet" href="./styles/style.css">
    <title>Bem Estar</title>
</head>

<body class="text-center body-login overflow-hidden">
    <main class="m-auto overflow-hidden w-100 form-login">
        <div class="row">
            <div class="col-10 col-md-5 col-lg-3 mx-auto">
                <span class="fs-1 text-success fw-bold">Bem Estar <i class="fa-solid fa-list-check"></i></span>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-10 col-md-5 col-lg-3 mx-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nome" placeholder="Nome" onchange="alertaPreenchimento('#nome', '#label_nome');">
                    <label id="label_nome" for="nome">Nome</label>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-10 col-md-5 col-lg-3 mx-auto">
                <div class=" form-floating">
                    <i class="fa-solid fa-eye icon-eye d-none fs-5 text-success" id="open_eye" onclick="escondeSenha('#closed_eye', '#open_eye', '#senha');"></i>
                    <i class="fa-solid fa-eye-slash icon-eye d-block fs-5 text-success" id="closed_eye" onclick="mostraSenha('#closed_eye', '#open_eye', '#senha');"></i>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" onchange="alertaPreenchimento('#senha', '#label_senha');">
                    <label id="label_senha" for="senha">Senha</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-10 col-md-5 col-lg-3 mx-auto">
                <button class="w-100 btn btn-lg btn-success rounded" onclick="login();">Entrar</button>
            </div>
        </div>
    </main>
</body>

<script>
    function login() {
        var settings = {
            url: '../ajax/usuarioAjax.php',
            method: 'POST',
            data: {
                nome: $("#nome").val(),
                senha: $("#senha").val()
            }
        }
        $.ajax(settings).done(function(result) {
            if (result == true) {
                window.location.href = "../index.php";
            } else {
                $("#nome, #senha").val("");
                alertaPreenchimento('#nome', '#label_nome');
                alertaPreenchimento('#senha', '#label_senha');
                Swal.fire({
                    text: 'Senha e/ou e-mail incorretos',
                    icon: 'warning',
                    confirmButtonText: 'Sim',
                    background: '#edece6',
                    customClass: {
                        confirmButton: 'btn-success'
                    }
                });
            }
        });
    }

    // Mostra os campos que precisam ser preenchidos
    function alertaPreenchimento(idCampo, idLabel) {
        if ($(idCampo).val() == "") {
            $(idLabel).addClass("alerta-label");
            $(idCampo).addClass("alerta-input");
        } else {
            $(idLabel).removeClass("alerta-label");
            $(idCampo).removeClass("alerta-input");
        }
    }

    // Esconde senha
    function escondeSenha(closeId, openId, inputId) {
        $(openId).removeClass("d-block");
        $(openId).addClass("d-none");
        $(closeId).removeClass("d-none");
        $(closeId).addClass("d-block");
        $(inputId).attr("type", "password");
    }

    // Mostra senha
    function mostraSenha(closeId, openId, inputId) {
        $(closeId).removeClass("d-block");
        $(closeId).addClass("d-none");
        $(openId).removeClass("d-none");
        $(openId).addClass("d-block");
        $(inputId).attr("type", "text");
    }

    // Validação de celular
    function validacaoCelular(celular) {
        if (celular != "") {
            // Armazena o 6º dígito do celular
            digito = celular.substring(5, 6);
            // Verifica se o celular possui o nono dígito
            if (celular.length == 15) {
                // Verifica se o dígito é válido
                if (digito != 9)
                    return false;
                else
                    return true;
            } else if (celular.length == 14) {
                // Verifica se o dígito é válido
                if (digito < 6)
                    return false;
                else
                    return true;
            } else {
                return false;
            }
        }
    }
</script>

</html>