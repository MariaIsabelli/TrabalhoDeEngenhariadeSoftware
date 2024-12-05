<?php
//Chamada de inclusão do arquivo de conexão com o BD.
include("../../configuration/connection.php");

//Chamada para o arquivo que verifica se o usuário está logado.
include("../../configuration/user-session.php");

//Recuperar o ID da transação via método GET.
$id_transacao = $_GET["id_transacao"];

// Instrução SQL para realizar a exclusão lógica da transação.
$SQL = "UPDATE transacao SET ativo = 0 WHERE id_transacao = $id_transacao;";

// Executar a instrução SQL e pegar o resultado.
if(mysqli_query($connect, $SQL)){

    //Fecha a conexão com o BD.
    mysqli_close($connect);

    //Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "A transação foi excluída com sucesso!!!";

    //Redireciona o usuário.
    header("location: proccess-list-transicion.php");
} else {
    //Fecha a conexão com o BD.
    mysqli_close($connect);

    //Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "Não foi possível excluir a transação!!!";

    //Redireciona o usuário.
    header("location: proccess-list-transicion.php");
}
?>
