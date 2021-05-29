<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-touch-icon-114x114.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="../style/global.css" link>
    <link rel="stylesheet" href="../style/funcionario.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Área do Funcionário</title>
</head>

<body>
    <?php require 'conectaBD.php'; ?>

    <main class="container2">

        <div class="centro">

            <div class="conteudo">

                <div class="centro">
                    <h1> Treinos de FULANO </h1>
                </div>

                <div class="linha">
                    <div class="modalFicha">
                        <div class="centro">
                            <h2>Ficha de Treino</h2>
                        </div>
                        <table>
                            <tr>
                                <th width='20%'> Exercicio </th>
                                <th width='10%'> Séries </th>
                                <th width='10%'> Repetições </th>
                                <th width='10%'> Intervalo </th>
                            </tr>
                            <tr>
                                <th width='20%'> Supino Reto </th>
                                <th width='10%'> 1x </th>
                                <th width='10%'> 10x </th>
                                <th width='20%'> 60 sec </th>
                            </tr>
                        </table>

                        <div class="divButtonModal">
                            <button class="excluirFicha" type="submit">Excluir</button>
                            <button class="editarFicha" type="submit">Editar</button>
                        </div>

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