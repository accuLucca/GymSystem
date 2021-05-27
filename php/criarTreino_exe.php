<?php

    require 'conectaBD.php';

    // Acesso ao BD
    $series = $_POST['series'];
    $repeticoes = $_POST['repeticoes'];
    $intervalo = $_POST['intervalo'];
    $matricula = $_POST['matricula'];

    // Faz Select na Base de Dados
	$sql = "INSERT INTO Treino (series, repeticoes, intervalo, matricula) VALUES ('$series','$repeticoes','$intervalo', '$matricula')";

    if ($result = mysqli_query($conn, $sql)) {
        echo 'registro inserido';
    } else {
        echo "Erro executando INSERT: " . mysqli_error($conn);
    }

	mysqli_close($conn);  //Encerra conexao com o BD

?>