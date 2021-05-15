<?php
    require 'conectaBD.php';

    $matricula = $_POST['matricula'];
    $cpf = $_POST['CPF'];
    $nome = $_POST['Nome'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['Celular'];
    $email = $_POST['email'];

    $sql = "UPDATE Aluno SET cpf = '$cpf', nome = '$nome', nascimento = '$nascimento', telefone = '$telefone', email = '$email' WHERE matricula = $matricula";

    if ($result = mysqli_query($conn, $sql)) {
        echo "Um registro alterado!";
    } else {
        echo "Erro executando UPDATE: " . mysqli_error($conn);
    }
    mysqli_close($conn); //Encerra conexao com o BD

    
?>