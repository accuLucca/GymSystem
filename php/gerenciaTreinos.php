<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-touch-icon-114x114.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="../style/modal.css" link>
    <link rel="stylesheet" href="../style/global.css" link>
    <link rel="stylesheet" href="../style/funcionario.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Gerenciamento de Treinos</title>
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

            <?php

            require 'conectaBD.php';

            // Faz Select na Base de Dados
            $sql = "SELECT matricula, nome FROM Aluno";
            echo "<div class='gerenciaAluno'>";
            echo "<h1>Gerenciamento de treinos</h1>";
            echo "<div class='alunos'>";
            echo "<table>";

            if ($result = mysqli_query($conn, $sql)) {

                echo "<tr>";
                echo "<th width='3%'> <h3> Matrícula </h3> </th>";
                echo "<th width='20%'> <h3> Nome </h3> </th>";
                echo "<th width='1%'></th>";
                echo "<th width='1%'></th>";
                echo "<th width='1%'></th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $cod = $row["matricula"];
                    echo "<tr class= 'border_bottom'>";
                    echo "<th> <span>" . $cod . "</span> </th>";
                    echo "<th> <span>" . $row["nome"] . "</span> </th>";
                    echo "<th> <form action='criarFicha.php?matricula=$cod' method='post'> <button class='criarFicha'> Criar ficha </button> </form> </th>";
                    echo "<th> <form action='inserirExercicios.php?matricula=$cod' method='post'> <button class='inserirTreino'> Inserir exercícios </button> </form> </th>";
                    echo "<th> <form action='visualizarTreino.php?matricula=$cod' method='post'> <button class='visualizarTreino'> Visualzar Treinos </button> </form> </th>";
                    echo "</tr>";
                }
            }
            echo "</table>";
            echo "</div>";
            echo "</div>";


            mysqli_close($conn);
            ?>

        </div>

    </main>

</body>

</html>

<script src="../js/script.js"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.mask.js"></script>