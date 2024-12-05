<?php
    //Chamada de inclusão do arquivo de conexão com o BD.
    include("../../configuration/connection.php");

    //Chamada para o arquivo que verifica se o usuário está logado.
    include("../../configuration/user-session.php");

// Receber os dados passados via método POST.
$id = $_POST["id"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$ano = $_POST["ano"];
$placa = $_POST["placa"];
$cor = $_POST["cor"];
$valor = $_POST["valor"];

// Instrução SQL que atualiza os dados do veículo.
$SQL = "UPDATE veiculo
SET marca = '$marca',
    modelo = '$modelo',
    ano = '$ano',
    placa = '$placa',
    cor = '$cor',
    valor = '$valor'
WHERE id_veiculo = '$id';";

//Faz a execução da instrução SQL e obtem um retorno.
if(mysqli_query($connect, $SQL)){

    //Fecha a conexão com o BD.
    mysqli_close($connect);

    //Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "As informações do veículo foram alteradas com sucesso!!!";

    //Redireciona o usuário.
    header("location: form-edit-car.php?id=" . $id);
}else{
    //Fecha a conexão com o BD.
    mysqli_close($connect);

    //Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "Não foi possivel alterar as informações do veículo!!!";

    //Redireciona o usuário.
    header("location: form-edit-car.php?id=" . $id);
}
?>