<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="../style/global.css" link>
    <link rel="stylesheet" href="../style/funcionario.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title> Funcionário </title>
</head>

<body>

    <main class="container2">


        <div class="centro">
            <div class="modal">
                <?php

                require 'conectaBD.php';

                $matricula = $_GET['matricula']; //DA ERRO, PORÉM É NECESSÁRIO PARA SELECIONAR O USUÁRIO CERTO

                $sql = "SELECT matricula, cpf, nome, telefone, email, nascimento FROM Aluno WHERE matricula = '$matricula'";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        // Apresenta cada linha da tabelas
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <h1>Atualização Cadastral</h1>


                            <form action="../php/editarAluno_exe.php" method="post">

                                <h3> Aluno: <?php echo $row['matricula']; ?> - <?php echo $row['nome']; ?> </h3>

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