<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-touch-icon-114x114.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="../style/modal.css" link>
    <link rel="stylesheet" href="../style/global.css" link>
    <link rel="stylesheet" href="../style/funcionario.css" link>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Inserir Exercícios</title>
</head>

<body>
    <main class="container2">

        <div class="centro">

            <div class="conteudo">

                <?php require 'conectaBD.php'; ?>

                <?php
                $matricula = $_GET['matricula'];

                // Faz Select na Base de Dados
                $sql = "SELECT matricula, nome FROM Aluno WHERE matricula = '$matricula'";
                $sql2 = "SELECT ID_Treino FROM Treino WHERE matricula = '$matricula'";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        // Apresenta cada linha da tabelas
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<input type='hidden' id='matricula' name='matricula' value='" . $row['matricula'] . "'>";
                ?>
                            <div class="centro">
                                <h1> Aluno - <?php echo $row['nome']; ?></h1>
                            </div>

                            <div class="linha">
                                <div class="modalFicha">
                                    <div class="centro">
                                        <h2>Insira um exercicio</h2>
                                    </div>

                                    <?php
                                    echo "<form action='../php/inserirExercicios_exe.php?matricula=$matricula' method='post'>";
                                    ?>
                                    <?php

                                    echo "<div class='divSelect'>";
                                    echo "<label>Selecione uma ficha </label>";
                                    echo "<select name='ID_Treino' id='exercicio'>";
                                    if ($result = mysqli_query($conn, $sql2)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['ID_Treino'] . "'>" . $row["ID_Treino"] . "</option>";
                                        }
                                        echo "</select required>";
                                        echo "</div>";
                                    }
                                    ?>

                                    <div id="exercicios">
                                        <div class='divSelect'>
                                            <label>Selecione um exercicio </label>
                                            <select name='exercicio' id='exercicio'>
                                                <option value="Supino Reto">Supino Reto</option>
                                                <option value="Supino Inclinado">Supino Inclinado</option>
                                                <option value="Rosca Martelo">Rosca Martelo</option>
                                                <option value="Rosca Francesa">Rosca Francesa</option>
                                                <option value="Leg Press 45º">Leg Press 45º</option>
                                                <option value="Leg Press 90º">Leg Press 90º</option>
                                                <option value="Adutor">Adutor</option>
                                                <option value="Abdutor">Abdutor</option>
                                                <option value="Cadeira Extensora">Cadeira Extensora</option>
                                                <option value="Cadeira Flexora">Cadeira Flexora</option>
                                                <option value="Abdominal Infra">Abdominal Infra</option>
                                                <option value="Abdominal Oblíquo">Abdominal Oblíquo</option>
                                            </select required>

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

                                            <div class="divInputs">
                                                <label>Informe o tempo de intervalo: </label>
                                                <input id="intervalo" name="intervalo" type="number" placeholder="Ex: 100" required>
                                            </div>

                                            <div class="divInputs">
                                                <p>Deseja inserir um vídeo de execução?</p>
                                                <input name="url" class="url" type="url" placeholder="Ex: https://youtube.com">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="divButtonModal">
                                        <button class="bCancelar" type="button" onclick="window.location.href='gerenciaTreinos.php'">Cancelar</button>
                                        <button class="bCadastar" type="submit">Inserir</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                <?php
                        }
                    }
                } else {
                    echo "Erro visualizando treino: " . mysqli_error($conn);
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