<?php

    require 'conectaBD.php';

    // Acesso ao BD
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    // Faz Select na Base de Dados
	$sql = "INSERT INTO Avaliacao_Fisica (data, hora) VALUES ('$data','$hora')";

    if ($result = mysqli_query($conn, $sql)) {
        header("Location: /GymSystem/php/visualizarHorarioAvalFisica.php");
    } else {
        echo "Erro executando INSERT do aluno " . mysqli_error($conn);
    }

	mysqli_close($conn);  //Encerra conexao com o BD

?>