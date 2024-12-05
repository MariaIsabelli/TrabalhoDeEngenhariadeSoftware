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
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $numeroResidencia = $_POST["numeroResidencia"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $codigoArea = $_POST["codigoArea"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];

    // tem que retornar valor para verificar se o cpf está cadastrado/existe no bd
    $SQLVerificaCPF = "SELECT cpf FROM funcionario WHERE cpf = '$cpf';";

    //execulta a consulta
    $consultaCPF = mysqli_query($connect, $SQLVerificaCPF);
    
    //verifica se houve retorno na consulta 
    if(mysqli_num_rows($consultaCPF) > 0){

       //Encerra a conexão com o BD.
       mysqli_close($connect);

       //Cria uma variável de retorno usando a sessão.
       $_SESSION['retorno'] = "Funcionário já cadastrado!!";

       //Redireciona o usuário.
       header("location: form-create-user.php");
    }else{
    //verifica se o usuário digitou as senhas corretamente
    if($senha == $confirmaSenha){
                                    //Instrução SQL de inserção de dados no BD.
                                    $SQL = "INSERT INTO funcionario (nome, 
                                    cpf, 
                                    data_nascimento, 
                                    genero, 
                                    cep, 
                                    logradouro, 
                                    numero_residencia,
                                    complemento, 
                                    bairro,
                                    cidade,
                                    estado,
                                    codigo_area, 
                                    numero_celular, 
                                    email, 
                                    senha, 
                                    ativo)
            VALUES ('" . $nome . "', 
            '" . $cpf . "', 
            '" . $dataNascimento . "', 
            '" . $genero . "', 
            '" . $cep . "', 
            '" . $logradouro . "', 
            '" . $numeroResidencia . "', 
            '" . $complemento . "', 
            '" . $bairro . "',
            '" . $cidade . "',
            '" . $estado . "',
            '" . $codigoArea . "', 
            '" . $celular . "', 
            '" . $email . "', 
            SHA1('" . $senha . "'),
            1);";

            //Faz a tentativa de inserção dos dados no BD.
            if (mysqli_query($connect, $SQL)) {

            //Encerra a conexão com o BD.
            mysqli_close($connect);

            //Cria uma variável de retorno usando a sessão.
            $_SESSION['retorno'] = "Funcionário cadastrado com sucesso!!!";

            //Redireciona o usuário.
            header("location: form-create-user.php");
            } else {
            //Encerra a conexão com o BD.
            mysqli_close($connect);

            //Cria uma variável de retorno usando a sessão.
            $_SESSION['retorno'] = "Não foi possível cadastrar o Funcinário!!!";

            //Redireciona o usuário.
            header("location: form-create-user.php");
            }
    }else{
        //Encerra a conexão com o BD.
        mysqli_close($connect);

       //Cria uma variável de retorno usando a sessão.
       $_SESSION['retorno'] = "O campo senha e confirmar senha não conferem!!!";

       //Redireciona o usuário.
       header("location: form-create-user.php");
       }
    } 
?>