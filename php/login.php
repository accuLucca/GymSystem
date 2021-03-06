<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-touch-icon-114x114.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="../style/login.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <title> Login </title>
</head>

<body>

    <main class="containerLogin">

        <div class="centro">
            
            <div class="box">

                <h2>Que tipo de usuário é você?</h2>

                <div class='divButton'>

                    <button class="aluno" onclick="ModalAluno.open()">Aluno<img src="../img/aluno.svg" alt="aluno">
                    </button>
                    <button class="funcionario" onclick="ModalFuncionario.open()">Funcionário<img
                            src="../img/employee.svg" alt="funcionario"></button>
                </div>

            </div>
        </div>

    </main>

    <div class="modal-overlay-aluno">

        <div class="modal-erro-aluno">
            <p>Preencha todos os campos!</p>
        </div>

        <div class="modal">

            <h2>Login</h2>
            <div class="divInputs">
                <input id="inputMatricula" type="text" placeholder="Matrícula">
            </div>

            <div class="divInputs">
                <input id="inputSenhaAluno" type="password" placeholder="Senha">
            </div>

            <div class="divButtonModal">
                <button class="bCancelar" onclick="ModalAluno.close()">Cancelar</button>
                <button class="bLogar" onclick="ModalAluno.validarCampo()">Logar</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay-funcionario">

        <div class="modal-erro-funcionario">
            <p>Preencha todos os campos!</p>
        </div>

        <div class="modal">

            <h2>Login</h2>
            <form action="logar.php" method="POST">
            <div class="divInputs">
                <input id="inputFuncionario" type="text" name="cref" placeholder="Usuário">
            </div>

            <div class="divInputs">
                <input id="inputSenhaFuncionario" type="password" name="senha" placeholder="Senha">
            </div>

            <div class="divButtonModal">
                <button type="button" class="bCancelar" onclick="ModalFuncionario.close()">Cancelar</button>
                <button type="submit" class="bLogar" onclick="ModalFuncionario.validarCampo()">Logar</button>
            </div>
            </form>
        </div>
    </div>


</body>

</html>

<script src="../js/script.js"></script>