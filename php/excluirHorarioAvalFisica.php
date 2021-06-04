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

    <title> Exclusão horário de treino </title>
</head>

<body>

    <main class="container2">

        <div class="centro">
            <div class="modal3">
                <?php

                require 'conectaBD.php';

                $id = $_GET['ID_Avaliacao'];

                $sql = "SELECT ID_Avaliacao, data, hora FROM Avaliacao_Fisica WHERE ID_Avaliacao = '$id'";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        // Apresenta cada linha da tabelas
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data = explode('-', $row["data"]);
                            $ano = $data[0];
                            $mes = $data[1];
                            $dia = $data[2];
                            $nova_data = $dia . '/' . $mes . '/' . $ano;
                ?>

                            <h1>Exclusão do horário de Avaliação Física</h1>

                            <div class="excluir">
                                <form action="../php/excluirHorarioAvalFisica_exe.php" method="post">
                                    <input type="hidden" id="ID_Avaliacao" name="ID_Avaliacao" value="<?php echo $row['ID_Avaliacao']; ?>">


                                    <div class="divExc">
                                        <h3> Data: </h3>
                                        <p> <?php echo $nova_data; ?> </p>
                                    </div>
                                    <div class="divExc">
                                        <h3> Hora: </h3>
                                        <p> <?php echo $row['hora']; ?> </p>
                                    </div>

                                    <div class="divExcButton">
                                        <button class="bCancelar" type="button" onclick="window.location.href='visualizarHorarioAvalFisica.php'"> Cancelar </button>
                                        <button class="bCadastar" type="submit"> Desmarcar </button>
                                    </div>

                                </form>
                    <?php
                        }
                    }
                } else {
                    echo "Erro executando DELETE: " . mysqli_error($conn);
                }
                mysqli_close($conn); //Encerra conexao com o BD
                    ?>
                            </div>


            </div>
        </div>



    </main>

</body>

</html>

<script src="../js/script.js"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.mask.js"></script>