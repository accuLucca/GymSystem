<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="../style/modal.css" link>
    <link rel="stylesheet" href="../style/global.css" link>
    <link rel="stylesheet" href="../style/funcionario.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Gerenciamento de Alunos</title>

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
            <div class='gerenciaAluno'>
                <h1>Gerenciamento de alunos</h1>
                <div class='alunos'>
                    <table>
                        <?php

                        require 'conectaBD.php';

                        // Faz Select na Base de Dados
                        $sql = "SELECT matricula, nome, telefone, nascimento FROM Aluno";

                        if ($result = mysqli_query($conn, $sql)) {
                            $total = mysqli_num_rows($result);
                            if ($total === 0) {
                                echo '<div class="centro">';
                                echo '<h3>Não há alunos cadastrados</h3>';
                                echo '</div>';
                            } else {
                                echo "<tr>";
                                echo "<th width='3%'> <h3> Matrícula </h3> </th>";
                                echo "<th width='20%'> <h3> Nome </h3> </th>";
                                echo "<th width='10%'> <h3> Celular </h3> </th>";
                                echo "<th width='10%'> <h3> Data Nascimento </h3> </th>";
                                echo "<th width='1%'></th>";
                                echo "<th width='1%'></th>";
                                echo "</tr>";

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $dataN = explode('-', $row["nascimento"]);
                                    $ano = $dataN[0];
                                    $mes = $dataN[1];
                                    $dia = $dataN[2];
                                    $cod = $row["matricula"];
                                    $nova_data = $dia . '/' . $mes . '/' . $ano;
                                    echo "<tr class= 'border_bottom'>";
                                    echo "<th> <span>" . $cod . "</span> </th>";
                                    echo "<th> <span>" . $row["nome"] . "</span> </th>";
                                    echo "<th> <span>" . $row["telefone"] . "</span> </th>";
                                    echo "<th> <span>" . $nova_data . "</span> </th>";
                                    echo "<th> <form action='editarAluno.php?matricula=$cod' method='post'> <button type='submit' class='botoes'> <img src='../img/edit.svg'> </button> </form> </th>";
                                    echo "<th> <form action='excluirAluno.php?matricula=$cod' method='post'> <button type='submit' class='botoes'> <img src='../img/trash.svg'> </button> </form> </th>";
                                    echo "</tr>";
                                }
                            }
                        } else  {
                            echo "Erro executando SELECT: " . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                        ?>
                        
                    </table>
                    <div class='bCadastro'>
                        <button class='newAluno' onclick='ModalCadastroAluno.open()'>Cadastrar aluno</button>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <div class="modal-overlay-criarAluno">

        <div class="modal">

            <h2>Cadastrar Aluno</h2>
            <form action="../php/incluirAluno_exe.php" method="post">
                <div class="divInputs">
                    <input id="CPF" name="CPF" type="text" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00')" required>
                </div>

                <div class="divInputs">
                    <input id="Nome" name="Nome" type="text" placeholder="Nome" required>
                </div>

                <div class="divInputs">
                    <input id="nascimento" name="nascimento" type="date" placeholder="Data de Nascimento" required>
                </div>

                <div class="divInputs">
                    <input id="Celular" name="Celular" type="tel" placeholder="Celular" onkeypress="$(this).mask('00000-0000')" required>
                </div>

                <div class="divInputs">
                    <input id="email" name="email" type="email" placeholder="E-mail" required>
                </div>

                <div class="divButtonModal">
                    <button class="bCancelar" type="button" onclick="ModalCadastroAluno.close()">Cancelar</button>
                    <button class="bCadastar" type="submit" onclick="">Cadastrar</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>

<script src="../js/script.js"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.mask.js"></script>