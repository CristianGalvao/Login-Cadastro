<?php

require_once "conexao.php";

//Criando a sessão
session_start();

if(isset($_POST['botao'])){

    $email = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);
    

    if(empty($email) or empty($senha)){

        echo '<script>alert("Há campos vázios, verifique!");location.href=("../../login.index.html");</script>';

    }else{

        //Verificando no banco de dados se e-mail existe
        $sql = "SELECT email FROM usuario WHERE email = '$email'";

        //Veriicando o resultado pela consulta
        $resultado = mysqli_query($conexao, $sql);

        //Comparando o e-mail passado com o banco
        if(mysqli_num_rows($resultado) > 0){

            //veririficar se o e-mail e a senha são compativeis
            $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

            //Guardar novamente na variavel resultado
            $resultado = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($resultado) == 1){

                //Armazenar um dado especifico do banco o ID
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($conexao);

                //Colocando para que cada usuario permaneça na sua sessão
                $_SESSION['logado'] == true;

                //Falando que a sessão estará ligado ao ID do usuario, ou seja, cada usuario terá sua sessão
                $_SESSION['id-usuario'] == $dados['id'];

                header('Location: tela-usuario.php');

            }else{
                echo '<script>alert("Senha ou E-mail não são compativeis");location.href=("../../login.index.html");</script>';
            }

        }else{
            echo '<script>alert("Usuario não existe, cadastre-se");location.href=("../../cadastrar.index.html");</script>';
        }

    }


}
?>