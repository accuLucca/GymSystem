<?php

    require 'conectaBD.php';
    
    $id = $_POST['ID_Avaliacao'];
    
    // Faz Select na Base de Dados
	$sql = "DELETE FROM Avaliacao_Fisica WHERE ID_Avaliacao = $id";

    if ($result = mysqli_query($conn, $sql)) {
        header("Location: /GymSystem/php/visualizarHorarioAvalFisica.php");
    } else {
    echo "Erro executando DELETE do aluno " . mysqli_error($conn);
    }

    mysqli_close($conn);  //Encerra conexao com o BD

?>
asdfsadfasdfasdfasdfa this is de 