<?php

    require 'conectaBD.php';
    
    $matricula = $_POST['matricula'];
    
    // Faz Select na Base de Dados
	$sql2 = "DELETE FROM Treino WHERE matricula = $matricula";
	$sql = "DELETE FROM Aluno WHERE matricula = $matricula";

    if ($result = mysqli_query($conn, $sql2)) {
        if ($result = mysqli_query($conn, $sql)) {
            header("Location: /GymSystem/php/listarAlunos.php");
        } else {
            echo "Erro executando DELETE do treino " . mysqli_error($conn);
        }
        echo 'ERRO EXCLUINDO ALUNO';
    } else {
    echo "Erro executando DELETE do aluno " . mysqli_error($conn);
    }



    mysqli_close($conn);  //Encerra conexao com o BD

?>