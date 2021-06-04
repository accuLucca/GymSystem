<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/modal.css" link>
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

                $ID_Professor = $_GET['ID_Professor'];

                $sql = "SELECT ID_Professor, cref, nome FROM Professor WHERE ID_Professor = '$ID_Professor'";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        // Apresenta cada linha da tabelas
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <h1>Exclusão do Professor</h1>

                            <div class="excluir">
                                <form action="../php/excluirProfessor_exe.php" method="post">
                                    <input type="hidden" id="ID_Professor" name="ID_Professor" value="<?php echo $row['ID_Professor']; ?>">

                                    <div class="divExc">
                                        <h3> CREF: </h3>
                                        <p> <?php echo $row['cref']; ?> </p>
                                    </div>
                                    <div class="divExc">
                                        <h3> Nome: </h3>
                                        <p> <?php echo $row['nome']; ?> </p>
                                    </div>

                                    <div class="divExcButton">
                                        <button class="bCancelar" type="button" onclick="window.location.href='listarProfessores.php'"> Cancelar </button>
                                        <button class="bCadastar" type="submit"> Excluir </button>
                                    </div>

                                </form>
                            </div>

                <?php
                        }
                    }
                } else  {
                    echo "Erro executando SELECT: " . mysqli_error($conn);
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