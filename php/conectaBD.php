<?php

global $servername;
global $username;
global $password;
global $database;

$servername = "localhost:3307";
$username = "Ricardo";
$password = "1234@puc";
$database = "academia";


// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verifica conexão 
if (!$conn) {
    die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
}

// Configura para trabalhar com caracteres acentuados do português
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

?>