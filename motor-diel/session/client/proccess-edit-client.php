<?php
    //Chamada de inclusão do arquivo de conexão com o BD.
    include("../../configuration/connection.php");

    //Chamada para o arquivo que verifica se o usuário está logado.
    include("../../configuration/user-session.php");

    //Receber os dados passados via método POST.
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $telefone = $_POST["telefone"];
    $genero = $_POST["genero"];
    $endereco = $_POST["endereco"];

    //Instrução SQL que atualiza os dados do usuário.
    $SQL = "UPDATE cliente
            SET nome = '$nome',
                cpf = '$cpf',
                data_nascimento = '$dataNascimento',
                telefone = '$telefone',
                genero = '$genero',
                endereco = '$endereco'
            WHERE id_cliente = '$id';";

    //Faz a execução da instrução SQL e obtem um retorno.
    if(mysqli_query($connect, $SQL)){

        //Fecha a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "As informações do usuário foram alteradas com sucesso!!!";

        //Redireciona o usuário.
        header("location: form-edit-client.php?id=" . $id);
    }else{
        //Fecha a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Não foi possivel alterar as informações do usuários!!!";

        //Redireciona o usuário.
        header("location: form-edit-client.php?id=" . $id);
    }
?>