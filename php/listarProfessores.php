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

    <title> Administrador </title>
</head>

<body>
    <header>
        <button class="menu" onclick="SideBar.sideBar()"><i class="fas fa-bars"></i></button>
    </header>

    <main class="container">
        <div class="sidebar">
            <button class="bSidebar" id="gerenciaAluno" onclick="window.location.href='listarProfessores.php'"> <img class="imgSidebar" src="../img/aluno.svg"> Gerenciar
                Professor </button>
        </div>

        <div class="content">
            <?php

            require 'conectaBD.php';

            // Faz Select na Base de Dados
            $sql = "SELECT ID_Professor, nome, cref, telefone FROM Professor";
            echo "<div class='gerenciaAluno'>";
            echo "<h1>Gerenciamento de professores</h1>";
            echo "<div class='alunos'>";
            echo "<table>";

            if ($result = mysqli_query($conn, $sql)) {

                echo "<tr>";
                echo "<th width='1%'> <h3> Código </h3> </th>";
                echo "<th width='20%'> <h3> Nome </h3> </th>";
                echo "<th width='10%'> <h3> CREF </h3> </th>";
                echo "<th width='10%'> <h3> Telefone </h3> </th>";
                echo "<th width='1%'></th>";
                echo "<th width='1%'></th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["ID_Professor"];
                    echo "<tr class= 'border_bottom'>";
                    echo "<th> <span>" . $row["ID_Professor"] . "</span> </th>";
                    echo "<th> <span>" . $row["nome"] . "</span> </th>";
                    echo "<th> <span>" . $row["cref"] . "</span> </th>";
                    echo "<th> <span>" . $row["telefone"] . "</span> </th>";
                    echo "<th> <form action='editarProfessor.php?ID_Professor=$id' method='post'> <button type='submit' class='botoes'> <img src='../img/edit.svg'> </button> </form> </th>";
                    echo "<th> <form action='excluirProfessor.php?ID_Professor=$id' method='post'> <button type='submit' class='botoes'> <img src='../img/trash.svg'> </button> </form> </th>";
                    echo "</tr>";
                }
            }
            echo "</table>";
            echo "<div class='bCadastro'>";
            echo "<button class='newAluno' onclick='ModalCadastroProfessor.open()'>Cadastrar professor</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";


            mysqli_close($conn);
            ?>

        </div>

    </main>

    <div class="modal-overlay-criarProfessor">

        <div class="modal">

            <h2>Cadastrar Professor</h2>
            <form action="../php/incluirProfessor_exe.php" method="post">
                <div class="divInputs">
                    <input id="cref" name="cref" type="text" placeholder="CREF" onkeypress="$(this).mask('000000')" required>
                </div>

                <div class="divInputs">
                    <input id="nome" name="nome" type="text" placeholder="Nome" required>
                </div>

                <div class="divInputs">
                    <input id="telefone" name="telefone" type="tel" placeholder="Celular" onkeypress="$(this).mask('00000-0000')" required>
                </div>

                <div class="divButtonModal">
                    <button class="bCancelar" type="button" onclick="ModalCadastroProfessor.close()">Cancelar</button>
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