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

    if ($result = mysqli_query($conn, $sql)) {       
             
            echo "<script language='JavaScript'>
            alert('Exercicio inserido com sucesso!');
            window.location = '/GymSystem/php/inserirExercicios.php?matricula=$matricula';
            </script>";
        
    } else {
        echo "Erro executando INSERT do treino: " . mysqli_error($conn);
    }

    

	mysqli_close($conn);  //Encerra conexao com o BD

?>