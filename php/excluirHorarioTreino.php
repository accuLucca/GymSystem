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
            <div class="modal2">

                <h1>Exclusão horário de treino</h1>

                <div class="excluir">
                    <form action="../php/.php" method="post">
                        <input type="hidden" id="" name="" value=" ">

                        <div class="divExc">
                            <h3> Data: </h3>
                            <p> </p>
                        </div>
                        <div class="divExc">
                            <h3> Hora: </h3>
                            <p> </p>
                        </div>

                        <div class="divExcButton">
                            <button class="bCancelar" type="button" onclick="window.location.href='visualizarHorarioTreino.php'"> Cancelar </button>
                            <button class="bCadastar" type="submit"> Excluir </button>
                        </div>

                    </form>
                </div>


            </div>
        </div>



    </main>

</body>

</html>

<script src="../js/script.js"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.mask.js"></script>