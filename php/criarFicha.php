<?php

    require 'conectaBD.php';

    $matricula = $_GET['matricula'];

    // Faz Select na Base de Dados
    $sql = "INSERT INTO Treino (matricula) VALUES ('$matricula')";

    if ($result = mysqli_query($conn, $sql)) {       

        echo '<script language="JavaScript">
        alert("Ficha criada com sucesso!");
        window.location = "/GymSystem/php/gerenciaTreinos.php";
        </script>';
        
    }else {
        echo "Erro executando INSERT do treino: " . mysqli_error($conn);
    }

    mysqli_close($conn);  //Encerra conexao com o BD

?>