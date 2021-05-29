<?php

    require 'conectaBD.php';

    // Acesso ao BD
    $nome = $_POST['nome'];
    $cref = $_POST['cref'];
    $telefone = $_POST['telefone'];
    $senha = md5($_POST['senha']);

    // Faz Select na Base de Dados
	$sql = "INSERT INTO Professor (nome, cref, telefone, senha) VALUES ('$nome','$cref','$telefone', '$senha')";

    if ($result = mysqli_query($conn, $sql)) {
        header("Location: /GymSystem/php/listarProfessores.php");
    } else {
        echo "Erro executando INSERT do professor " . mysqli_error($conn);
    }

	mysqli_close($conn);  //Encerra conexao com o BD

?>