<?php

    require 'conectaBD.php';
    
    $id = $_POST['ID_Agenda'];
    
    // Faz Select na Base de Dados
	$sql = "DELETE FROM Agenda WHERE ID_Agenda = $id";

    if ($result = mysqli_query($conn, $sql)) {
        header("Location: /GymSystem/php/visualizarHorarioTreino.php");
    } else {
    echo "Erro executando DELETE do aluno " . mysqli_error($conn);
    }

    mysqli_close($conn);  //Encerra conexao com o BD

?>