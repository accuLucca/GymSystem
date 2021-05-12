<?php

    require 'conectaBD.php';

    // Cria conexão
	$conn = mysqli_connect($servername, $username, $password, $database);

    
    // Verifica conexão
	if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
	}
    
    $matricula = $_POST[''];
    
    // Faz Select na Base de Dados
	$sql = "DELETE FROM Aluno WHERE matricula = $matricula";


?>