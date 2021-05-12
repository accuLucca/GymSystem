<?php

    require 'conectaBD.php';
    
    $matricula = $_POST[''];
    
    // Faz Select na Base de Dados
	$sql = "DELETE FROM Aluno WHERE matricula = $matricula";


?>