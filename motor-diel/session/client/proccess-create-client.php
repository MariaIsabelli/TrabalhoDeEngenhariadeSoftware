<?php
    //Chamada para o arquivo que verifica se o usuário está logado.
    include("../../configuration/user-session.php");

    //Chama o arquivo de conexão com o BD.
    include("../../configuration/connection.php");

    //Variáveis que irão receber os dados via POST do formulário.
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $genero = $_POST["genero"];
    $endereco = $_POST["logradouro"];
    $telefone = $_POST["celular"];

    //Instrução SQL de inserção de dados no BD.
    $SQL = "INSERT INTO cliente (nome, 
                                 cpf, 
                                 data_nascimento, 
                                 genero, 
                                 endereco, 
                                 telefone,  
                                 ativo)
            VALUES ('" . $nome . "', 
                    '" . $cpf . "', 
                    '" . $dataNascimento . "', 
                    '" . $genero . "', 
                    '" . $endereco . "', 
                    '" . $telefone . "', 
                    1);";

    //Faz a tentativa de inserção dos dados no BD.
    if (mysqli_query($connect, $SQL)) {
        
        //Encerra a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Cliente cadastrado com sucesso!!!";

        //Redireciona o usuário.
        header("location: ../dashboard.php");
    } else {
        //Encerra a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Não foi possível cadastrar o cliente!!!";

        //Redireciona o usuário.
        header("location: form-create-client.php");
    }
?>