<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-touch-icon-114x114.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="../style/global.css" link>
    <link rel="stylesheet" href="../style/modal.css" link>
    <link rel="stylesheet" href="../style/aluno.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Horário Avaliação Física</title>
</head>

<body>
    <header>
        <button class="menu" onclick="SideBar.sideBar()"> <i class="fas fa-bars"> </i></button>
    </header>

    <main class="container">
        <div class="sidebar">
            <button class="bSidebar"> <img class="imgSidebar" src="../img/ficha.svg"> Ficha de treino </button>
            <button class="bSidebar" onclick="horaTreino()"> <img class="imgSidebar" src="../img/clock.svg"> Horário de treino </button>
            <button class="bSidebar" onclick="horaAvalFisica()"> <img class="imgSidebar" src="../img/weight.svg"> Avaliação física </button>
        </div>

        <div>

            <div class='content'>
                <h1>Horários de avaliações físcias marcadas</h1>
                <table cellspacing=10>

                    <div class="alunos">
                        <?php

                        require 'conectaBD.php';

                        // Faz Select na Base de Dados
                        $sql = "SELECT ID_Avaliacao, data, hora FROM Avaliacao_Fisica";
                        if ($result = mysqli_query($conn, $sql)) {
                            $total = mysqli_num_rows($result);
                            if ($total === 0) {
                                echo '<div class="centro">';
                                echo '<h3>Não há horário marcado</h3>';
                                echo '</div>';
                            } else {
                                echo '<tr>';
                                echo '<th width="3%">';
                                echo '<h3> Data </h3>';
                                echo '</th>';
                                echo '<th width="20%">';
                                echo '<h3> Hora </h3>';
                                echo '</th>';
                                echo '<th width="1%"></th>';
                                echo '<th width="1%"></th>';
                                echo '</tr>';

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['ID_Avaliacao'];
                                    $data = explode('-', $row["data"]);
                                    $ano = $data[0];
                                    $mes = $data[1];
                                    $dia = $data[2];
                                    $nova_data = $dia . '/' . $mes . '/' . $ano;

                                    echo '<tr class="border_bottom">';
                                    echo '<th> <span>' . $nova_data . '</span> </th>';
                                    echo '<th> <span>' . $row['hora'] . '</span> </th>';
                                    echo "<th> <button class='visualizar'> Visualizar </button> </th>";
                                    echo "<th> <form action='excluirHorarioAvalFisica.php?ID_Avaliacao=$id' method='post'> <button class='desmarcar'> Desmarcar </button> </form> </th>";
                                    echo '</tr>';
                                }
                            }
                        } else  {
                            echo "Erro executando SELECT: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                </table>

                <div class="bCadastro" onclick="ModalHorario.open()">
                    <button class="marcarHorario"> Marcar novo horario</button>
                </div>

            </div>
        </div>
        </div>
    </main>

    <div class="modal-overlay-horario">

        <div class="modal">

            <h2>Marcar horário</h2>
            <form action="../php/marcarHorarioAvalFisica_exe.php" method="post">
                <div class="divInputs">
                    <h4>Escolha uma data:</h4>
                    <input id="data" name="data" type="date" placeholder="Data de Nascimento" required>
                </div>

                <div class="divInputs">
                    <h4>Escolha um horário:</h4>
                    <input id="hora" name="hora" type="time" placeholder="Celular" onkeypress="$(this).mask('00000-0000')" required>
                </div>

                <div class="divButtonModal">
                    <button class="bCancelar" type="button" onclick="ModalHorario.close()">Cancelar</button>
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