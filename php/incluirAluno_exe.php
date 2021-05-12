<?php

    require 'conectaBD.php';

    // Acesso ao BD
    $cpf = $_POST['CPF'];
    $nome = $_POST['Nome'];
    $nascimento = $_POST['nascimento'];
    $celular = $_POST['Celular'];
    $email = $_POST['email'];

    // Faz Select na Base de Dados
	$sql = "INSERT INTO Aluno (cpf, nome, telefone, email, nascimento) VALUES ('$cpf','$nome','$celular','$email','$nascimento')";

    if ($result = mysqli_query($conn, $sql)) {
        echo 'registro inserido';
    } else {
        echo "Erro executando INSERT: " . mysqli_error($conn);
    }

	mysqli_close($conn);  //Encerra conexao com o BD

?>