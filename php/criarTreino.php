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
    <main class="container2">

        <div class="centro">
            <div class="modal">

                <?php require 'conectaBD.php'; ?>

                <?php

                $matricula = $_GET['matricula'];

                // Faz Select na Base de Dados
                $sql = "SELECT matricula, nome FROM Aluno WHERE matricula = '$matricula'";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        // Apresenta cada linha da tabelas
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>

                            <h2>Criando treino para: <h3><?php echo $row['matricula']; ?> - <?php echo $row['nome']; ?></h3>
                            </h2>
                            <form action="../php/criarTreino_exe.php" method="post">

                                <?php

                                $matricula = $_GET['matricula'];

                                $sql2 = "SELECT matricula FROM Aluno WHERE matricula = '$matricula'";

                                if ($result = mysqli_query($conn, $sql2)) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<input type='hidden' id='matricula' name='matricula' value='" . $row['matricula'] . "'>";
                                    }
                                }
                                ?>

                                <div class='divInputs'>
                                    <label>Selecione um exercicio </label>
                                    <select name='exercicio' id='exercicio'>
                                        <option value="1">Supino Reto</option>
                                        <option value="2">Supino Inclinado</option>
                                        <option value="3">Rosca Martelo</option>
                                        <option value="4">Rosca Francesa</option>
                                        <option value="5">Leg Press 45º</option>
                                        <option value="6">Leg Press 90º</option>
                                        <option value="7">Adutor</option>
                                        <option value="8">Abdutor</option>
                                        <option value="9">Cadeira Extensora</option>
                                        <option value="9">Cadeira Flexora</option>
                                        <option value="10">Abdominal Infra</option>
                                        <option value="10">Abdominal Oblíquo</option>
                                    </select required>
                                </div>

                                <div class="divInputs">
                                    <label>Selecione o número de séries</label>
                                    <select name="series" id="series">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select required>
                                </div>

                                <div class="divInputs">
                                    <label> Selecione o número de repetições</label>
                                    <select name="repeticoes" id="repeticoes">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                    </select required>
                                </div>

                                <div class="divInputs">
                                    <h5>Informe o tempo de intervalo: </h5>
                                    <input id="intervalo" name="intervalo" type="number" placeholder="Ex: 100" required>
                                </div>

                                <div class="divButtonModal">
                                    <button class="bCancelar" type="button" onclick="window.location.href='gerenciaTreinos.php'">Cancelar</button>
                                    <button class="bCadastar" type="submit">Cadastrar</button>
                                </div>
                            </form>
                <?php
                        }
                    }
                } else {
                    echo "Erro criando treino: " . mysqli_error($conn);
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