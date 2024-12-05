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
    $genero = $_POST["genero"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["endereco"];
    $numeroResidencia = $_POST["numeroResidencia"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $codigoArea = $_POST["codigoArea"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];

    //Instrução SQL que atualiza os dados do usuário.
    $SQL = "UPDATE funcionario
            SET nome = '$nome',
                cpf = '$cpf',
                data_nascimento = '$dataNascimento',
                genero = '$genero',
                cep = '$cep',
                logradouro = '$logradouro',
                numero_residencia = '$numeroResidencia',
                complemento = '$complemento',
                bairro = '$bairro',
                cidade = '$cidade',
                estado = '$estado',
                codigo_area = '$codigoArea',
                numero_celular = '$celular',
                email = '$email'
            WHERE id_funcionario = '$id';";

    //Faz a execução da instrução SQL e obtem um retorno.
    if(mysqli_query($connect, $SQL)){

        //Fecha a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "As informações do funcionario foram alteradas com sucesso!!!";

        //Redireciona o usuário.
        header("location: form-edit-user.php?id=" . $id);
    }else{
        //Fecha a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Não foi possivel alterar as informações do funcionario!!!";

        //Redireciona o usuário.
        header("location: form-edit-user.php?id=" . $id);
    }
?>