<?php

    require 'conectaBD.php';

    // Acesso ao BD
    $nome = $_POST['nome'];
    $cref = $_POST['cref'];
    $telefone = $_POST['telefone'];

    // Faz Select na Base de Dados
	$sql = "INSERT INTO Professor (nome, cref, telefone) VALUES ('$nome','$cref','$telefone')";

    if ($result = mysqli_query($conn, $sql)) {
        echo "<script language='JavaScript'>
        alert('Professor cadastrado com sucesso!');
        window.location = '/GymSystem/php/listarProfessores.php';
        </script>";
    } else {
        echo "Erro executando INSERT do professor " . mysqli_error($conn);
    }

	mysqli_close($conn);  //Encerra conexao com o BD

?>