<?php
    require 'conectaBD.php';

    $ID_Professor = $_POST['ID_Professor'];
    $cref = $_POST['cref'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE Professor SET ID_Professor = '$ID_Professor', cref = '$cref', nome = '$nome', telefone = '$telefone' WHERE ID_Professor = $ID_Professor";

    if ($result = mysqli_query($conn, $sql)) {
        echo "Um registro alterado!";
    } else {
        echo "Erro executando UPDATE: " . mysqli_error($conn);
    }
    mysqli_close($conn); //Encerra conexao com o BD

    
?>