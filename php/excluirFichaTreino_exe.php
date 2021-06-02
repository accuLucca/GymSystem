<?php

    require 'conectaBD.php';
        
    $ID_Treino = $_GET['ID_Treino'];
    
    // Faz Select na Base de Dados
    $sql = "DELETE FROM Exercicio WHERE ID_Treino = $ID_Treino";
    $sql2 = "DELETE FROM Treino WHERE ID_Treino = $ID_Treino";

    if ($result = mysqli_query($conn, $sql)) {
        if ($result = mysqli_query($conn, $sql2)) {
            echo "<script language='JavaScript'>
            alert('Ficha excluida com sucesso!');
            window.location = '/GymSystem/php/gerenciaTreinos.php';
            </script>";        
        } else {
            echo "Erro executando DELETE do treino " . mysqli_error($conn);
        }
        echo 'ERRO EXCLUINDO FICHA DE TREINO';
    } else {
    echo "Erro executando DELETE do treino -> " . mysqli_error($conn);
    }

    mysqli_close($conn);  //Encerra conexao com o BD

?>