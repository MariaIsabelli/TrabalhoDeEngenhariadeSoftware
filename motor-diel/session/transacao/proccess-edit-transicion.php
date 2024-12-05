<?php
// Chamada de inclusão do arquivo de conexão com o BD.
include("../../configuration/connection.php");

// Chamada para o arquivo que verifica se o usuário está logado.
include("../../configuration/user-session.php");

// Receber os dados passados via método POST.
$id_transacao = $_POST["id_transacao"];
$id_usuario = $_POST["id_usuario"];
$id_cliente = $_POST["id_cliente"];
$id_veiculo = $_POST["id_veiculo"];
$data_transacao = $_POST["data_transacao"];
$data_entrega = $_POST["data_entrega"];
$ativo = $_POST["ativo"];

// Instrução SQL que atualiza os dados da transação.
$SQL = "UPDATE transacao
SET id_usuario = '$id_usuario',
id_cliente = '$id_cliente',
id_veiculo = '$id_veiculo',
data_transacao = '$data_transacao',
data_entrega = '$data_entrega',
ativo = '$ativo'
WHERE id_transacao = '$id_transacao';";

// Faz a execução da instrução SQL e obtém um retorno.
if(mysqli_query($connect, $SQL)){

    // Fecha a conexão com o BD.
    mysqli_close($connect);

    // Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "As informações da transação foram alteradas com sucesso!!!";

    // Redireciona o usuário.
    header("location: form-edit-transicion.php?id_transacao=" . $id_transacao);
} else {
    // Fecha a conexão com o BD.
    mysqli_close($connect);

    // Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "Não foi possível alterar as informações da transação!!!";

    // Redireciona o usuário.
    header("location: form-edit-transicion.php?id_transacao=" . $id_transacao);
}
?>
