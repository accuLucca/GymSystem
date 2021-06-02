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

    <title>Fichas de treino</title>
</head>

<body>
    <?php require 'conectaBD.php'; ?>

    <main class="container2">

        <div class="centro">

            <div class="conteudo">

                <?php
                $matricula = $_GET['matricula'];
                $sql2 = "SELECT nome FROM Aluno WHERE matricula = '$matricula'";
                if ($result = mysqli_query($conn, $sql2)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="centro">';
                        echo '<h1> Treinos de ' . $row['nome'] . '</h1>';
                        echo '</div>';
                    }
                }

                $sql = "SELECT treino.ID_Treino, exercicio.nome, exercicio.series, exercicio.repeticoes, exercicio.intervalo FROM Treino as treino, Exercicio as exercicio WHERE matricula = '$matricula' AND Treino.ID_Treino = Exercicio.ID_Treino ORDER BY ID_Treino";
                $sql2 = "SELECT ID_Treino FROM Treino WHERE matricula = '$matricula'";

                if ($result = mysqli_query($conn, $sql)) {
                    echo '<div class="linha">';
                    echo '<div class="modalFicha">';
                    echo '<div class="centro">';
                    echo '<h2>Ficha de Treino</h2>';
                    echo '</div>';
                    echo '<table>';
                    echo '<tr>';
                    echo '<th width="20%"> Exercicio </th>';
                    echo '<th width="10%"> Séries </th>';
                    echo '<th width="10%"> Repetições </th>';
                    echo '<th width="10%"> Intervalo </th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cod = $row["ID_Treino"];
                        echo '<tr>';
                        echo '<th width="20%">' . $row["nome"] . '</th>';
                        echo '<th width="10%">' . $row["series"] . 'x</th>';
                        echo '<th width="10%">' . $row["repeticoes"] . 'x</th>';
                        echo '<th width="20%">' . $row["intervalo"] . ' sec</th>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                $undefined = isset($cod);
                if ($undefined == false) {
                    echo '<div class="centro">';
                    echo '<h3>Não foram adicionados exercicios</h3>';
                    echo '</div>';
                } else {
                    echo "<form action='excluirFichaTreino_exe.php?ID_Treino=$cod' method='post'>";
                    echo '<div class="divButtonCancelar">';
                    echo '<button class="excluirFicha" type="submit">Excluir</button>';
                    echo '</div>';
                    echo '</form>';
                }
                mysqli_close($conn);
                ?>

                <div class="divButtonCancelar">
                    <button class="bCancelar" type="button" onclick="window.location.href='gerenciaTreinos.php'">Cancelar</button>
                </div>

            </div>
        </div>

        </div>

        </div>


    </main>

</body>

</html>

<script src="../js/script.js"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.mask.js"></script>