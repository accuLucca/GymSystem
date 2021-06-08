<?php

    require 'conectaBD.php';
    
    $ID_Professor = $_POST['ID_Professor'];
    
    // Faz Select na Base de Dados
	$sql = "DELETE FROM Professor WHERE ID_Professor = $ID_Professor";

    if ($result = mysqli_query($conn, $sql)) {
        echo "<script language='JavaScript'>
        alert('Professor excluido com sucesso!');
        window.location = '/GymSystem/php/listarProfessores.php';
        </script>";
    } else {
    echo "Erro executando DELETE do professor " . mysqli_error($conn);
    }

    mysqli_close($conn);  //Encerra conexao com o BD

?>