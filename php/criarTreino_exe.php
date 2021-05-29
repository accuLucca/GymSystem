<?php

    require 'conectaBD.php';

    // Acesso ao BD
    $nome = $_POST['exercicio'];
    $series = $_POST['series'];
    $repeticoes = $_POST['repeticoes'];
    $intervalo = $_POST['intervalo'];
    $ID_Treino = $_POST['ID_Treino'];
    $url = $_POST['url'];
    $matricula = $_GET['matricula'];

    // Faz Select na Base de Dados
	$sql = "INSERT INTO Exercicio (nome, series, repeticoes, intervalo, url, ID_Treino) VALUES ('$nome', '$series','$repeticoes','$intervalo', '$url', '$ID_Treino')";
    $sql2 = "INSERT INTO Video_Exericio (url) VALUES ('$url')";

    if ($result = mysqli_query($conn, $sql)) {       
        if ($result = mysqli_query($conn, $sql2)) {       
            echo "<script language='JavaScript'>
            alert('Treino inserido com sucesso!');
            window.location = '/GymSystem/php/visualizarTreino.php?matricula=$matricula';
            </script>";
        } else {
            echo "Erro executando INSERT do video: " . mysqli_error($conn);
        }
    } else {
        echo "Erro executando INSERT do treino: " . mysqli_error($conn);
    }

    

	mysqli_close($conn);  //Encerra conexao com o BD

?>