<?php

    require 'conectaBD.php';

    // Cria conexão
	$conn = mysqli_connect($servername, $username, $password, $database);
    
    // Verifica conexão
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

    // Acesso ao BD
    $cpf = $_POST['CPF'];
    $nome = $_POST['Nome'];
    $nascimento = $_POST['nascimento'];
    $celular = $_POST['Celular'];
    $email = $_POST['email'];
    
    // Configura para trabalhar com caracteres acentuados do português
	mysqli_query($conn,"SET NAMES 'utf8'");
	mysqli_query($conn,'SET character_set_connection=utf8');
	mysqli_query($conn,'SET character_set_client=utf8');
	mysqli_query($conn,'SET character_set_results=utf8');


    // Faz Select na Base de Dados
	$sql = "INSERT INTO Aluno (cpf, nome, telefone, email, nascimento) VALUES ('$cpf','$nome','$nascimento','$celular','$email')";
	mysqli_close($conn);  //Encerra conexao com o BD

?>