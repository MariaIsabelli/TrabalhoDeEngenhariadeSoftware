<?php
    //Verifica se a sessão de usuário existe.
    if(!isset($_SESSION)){

        //Caso ela não exista, cria a sessão de usuário.
        session_start();
       
        //apaga a variavel de sessao do ususario
       unset($_SESSION["usuarioEmail"]);
     
       //destroy a sessao do ususario
       session_destroy();

       //redireciona o usuario para a area piblica do website.
       header("location: ../index.php");
    }
?>