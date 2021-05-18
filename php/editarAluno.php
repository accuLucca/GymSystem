<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css" link>
    <link rel="stylesheet" href="../style/funcionario.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title> Funcionário </title>
</head>

<body>
    <header>
        <button class="menu" onclick="SideBar.sideBar()"><i class="fas fa-bars"></i></button>
    </header>

    <main class="container">
        <div class="sidebar">
            <button class="bSidebar" id="gerenciaTreino" onclick="gerenciaTreino()"> <img class="imgSidebar" src="../img/ficha.svg"> Gerenciar treinos </button>
            <button class="bSidebar" id="gerenciaAval" onclick="gerenciaAval()"> <img class="imgSidebar" src="../img/weight.svg"> Gerenciar avaliações físicas
            </button>
            <button class="bSidebar" id="gerenciaFluxo" onclick="gerenciaFluxo()"> <img class="imgSidebar" src="../img/fluxo.svg"> Gerenciar fluxo de pessoas </button>
            <button class="bSidebar" id="gerenciaAluno" onclick="gerenciaAluno()"> <img class="imgSidebar" src="../img/aluno.svg"> Gerenciar
                aluno </button>
        </div>

        <div class="content">
            <div class="gerenciaAluno">
                <?php

                require 'conectaBD.php';

                $matricula = $_GET['matricula']; //DA ERRO, PORÉM É NECESSÁRIO PARA SELECIONAR O USUÁRIO CERTO

                $sql = "SELECT matricula, cpf, nome, telefone, email, nascimento FROM Aluno WHERE matricula = '$matricula'";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        // Apresenta cada linha da tabelas
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <h1>Atualização Cadastral do Aluno</h1>

                            <div class="Editar">
                                <form action="../php/editarAluno_exe.php" method="post">
                                    <div class="titulo">
                                        <h2> Aluno: <?php echo $row['matricula']; ?> - <?php echo $row['nome']; ?> </h2>
                                    </div>
                                    <input type="hidden" id="matricula" name="matricula" value="<?php echo $row['matricula']; ?>">
                                    <div class="divAtt">
                                        <h4>CPF</h4>
                                        <input id="CPF" name="CPF" type="text" placeholder="CPF" value="<?php echo $row['cpf']; ?>" onkeypress="$(this).mask('000.000.000-00')" required>
                                    </div>

                                    <div class="divAtt">
                                        <h4>Nome</h4>
                                        <input id="Nome" name="Nome" type="text" placeholder="Nome" value="<?php echo $row['nome']; ?>" required>
                                    </div>

                                    <div class="divAtt">
                                        <h4>Data de Nascimento</h4>
                                        <input id="nascimento" name="nascimento" type="date" placeholder="Data de Nascimento" value="<?php echo $row['nascimento']; ?>" required>
                                    </div>

                                    <div class="divAtt">
                                        <h4>Celular</h4>
                                        <input id="Celular" name="Celular" type="tel" placeholder="Celular" value="<?php echo $row['telefone']; ?>" onkeypress="$(this).mask('00000-0000')" required>
                                    </div>

                                    <div class="divAtt">
                                        <h4>email</h4>
                                        <input id="email" name="email" type="email" placeholder="E-mail" value="<?php echo $row['email']; ?>" required>
                                    </div>

                                    <div class="divAttButton">
                                        <button class="bCancelar" type="button" onclick="window.location.href='listarAlunos.php'">Cancelar</button>
                                        <button class="bCadastar" type="submit" onclick="window.location.href='listarAlunos.php'">Alterar</button>
                                    </div>
                                </form>
                            </div>

                <?php
                        }
                    }
                } else {
                    echo "Erro executando UPDATE: " . mysqli_error($conn);
                }
                mysqli_close($conn); //Encerra conexao com o BD
                ?>

            </div>
        </div>



    </main>

</body>

</html>

<script src="../js/script.js"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.mask.js"></script>