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
            <button class="bSidebar" id="gerenciaAluno" onclick="gerenciaAluno()"> <img class="imgSidebar" src="../img/aluno.svg"> Gerenciar
                Professor </button>
        </div>

        <div class="content">
            <?php

            require 'conectaBD.php';

            // Faz Select na Base de Dados
            $sql = "SELECT nome, cref, telefone FROM Professor";
            echo "<div class='gerenciaAluno'>";
            echo "<h1>Gerenciamento de professores</h1>";
            echo "<div class='alunos'>";
            echo "<table>";

            if ($result = mysqli_query($conn, $sql)) {

                echo "<tr>";
                echo "<th width='20%'> <h3> Nome </h3> </th>";
                echo "<th width='10%'> <h3> CREF </h3> </th>";
                echo "<th width='10%'> <h3> Telefone </h3> </th>";
                echo "<th width='1%'></th>";
                echo "<th width='1%'></th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class= 'border_bottom'>";
                    echo "<th> <span>" . $row["nome"] . "</span> </th>";
                    echo "<th> <span>" . $row["cref"] . "</span> </th>";
                    echo "<th> <span>" . $row["telefone"] . "</span> </th>";
                    echo "<th> <button class='botoes' onclick='ModalAtualizaProfessor.open()'> <img src='../img/edit.svg'> </button> </th>";
                    echo "<th> <button class='botoes' onclick='ModalExcluirAluno.open()'> <img src='../img/trash.svg' > </th>";
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

    <div class="modal-overlay-excluir">

        <div class="modal">
            <?php

            require 'conectaBD.php';

            // Cria conexão
            $conn = mysqli_connect($servername, $username, $password, $database);

            // Verifica conexão
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Faz Select na Base de Dados
            $sql = "SELECT ID_Professor, nome FROM Professor";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    // Apresenta cada linha da tabela
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <h2>Tem certeza que deseja excluir o professor: <?php echo $row['nome'] ?></h2>
                        <form action="../php/excluirProfessor_exe.php" method="post">

                            <div class="divButtonModal">
                                <input type="hidden" id="matricula" name="ID_Professor" value="<?php echo $row['ID_Professor']; ?>">
                                <button class="bCancelar" type="button" onclick="ModalExcluirAluno.close()">Cancelar</button>
                                <button class="bCadastar" type="submit">Excluir</button>
                            </div>

                        </form>
            <?php
                    }
                }
            } else {
                echo "Erro executando DELETE: " . mysqli_error($conn);
            }
            mysqli_close($conn);  //Encerra conexao com o BD
            ?>
        </div>
    </div>

    <div class="modal-overlay-editarProfessor">

        <div class="modal">
            <?php

            require 'conectaBD.php';

            //$matricula = $_GET['matricula']; //DA ERRO, PORÉM É NECESSÁRIO PARA SELECIONAR O USUÁRIO CERTO

            $sql = "SELECT ID_Professor, nome, cref, telefone FROM Professor";

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    // Apresenta cada linha da tabelas
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>

                        <h2>Atualizar Professor</h2>
                        <p>Informe os dados a serem atualizados: </p>
                        <form action="../php/editarProfessor.php" method="post">
                            <input type="hidden" id="ID_Professor" name="ID_Professor" value="<?php echo $row['ID_Professor']; ?>">
                            <div class="divInputsAtualizar">
                                <h5>CREF</h5>
                                <input id="cref" name="cref" type="text" placeholder="CREF" value="<?php echo $row['cref']; ?>" onkeypress="$(this).mask('000000')" required>
                            </div>

                            <div class="divInputs">
                                <h5>Nome</h5>
                                <input id="nome" name="nome" type="text" placeholder="Nome" value="<?php echo $row['nome']; ?>" required>
                            </div>

                            <div class="divInputs">
                                <h5>Celular</h5>
                                <input id="telefone" name="telefone" type="tel" placeholder="Celular" value="<?php echo $row['telefone']; ?>" onkeypress="$(this).mask('00000-0000')" required>
                            </div>

                            <div class="divButtonModal">
                                <button class="bCancelar" type="button" onclick="ModalAtualizaProfessor.close()">Cancelar</button>
                                <button class="bCadastar" type="submit" onclick="">Atualizar</button>
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

</body>

</html>

<script src="../js/script.js"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.mask.js"></script>