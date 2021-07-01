<?php

$servername = 'localhost';
$user = 'root';
$password = '';
$database = 'login';

$conexao = mysqli_connect($servername, $user, $password, $database);

if(mysqli_connect_error()):
echo "Falha na conexão: ".mysqli_connect_error;
endif;
?>