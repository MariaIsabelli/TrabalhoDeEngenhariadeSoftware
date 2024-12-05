<?php
    //Verifica se a sessão de usuário existe.
    if(!isset($_SESSION)){

        //Caso ela não exista, cria a sessão de usuário.
        session_start();

        //Verifica se o usuário NÃO fez o login.
        if(!isset($_SESSION["usuarioEmail"])){

            //Caso ele NÃO tenha feito login, redireciona para o login.
            header("Location: ../login/form-login.php");
        }
    }
?>