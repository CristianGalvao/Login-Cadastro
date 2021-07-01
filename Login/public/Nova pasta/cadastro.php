<?php

require_once "conexao.php";

if(isset($_POST['nome']) && !empty($_POST['nome']) && ($_POST['email']) && !empty($_POST['email']) && ($_POST['telefone'])
 && !empty($_POST['telefone']) && ($_POST['endereco']) && !empty($_POST['endereco']) && ($_POST['sexo']) && !empty($_POST['sexo']) && ($_POST['senha']) 
 && !empty($_POST['senha'])){

    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $senha = $_POST['senha'];
    $senha = md5($senha);
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];


    $sql = "INSERT INTO usuario(nome, senha, email, telefone, endereco, sexo) values('$nome','$senha', '$email', '$telefone', '$endereco', '$sexo');";

   $resultado =  mysqli_query($conexao, $sql);

   if($resultado){
    echo '<script>alert("Cadastro efetuado, faça o login");location.href=("../../login.index.html");</script>';
   }

 }else{
    echo '<script>alert("Há campos vázios, verifique!");location.href=("../../cadastrar.index.html");</script>';
 }


?>