<?php
// Chamada para o arquivo que verifica se o usuário está logado.
include("../../configuration/user-session.php");

// Chama o arquivo de conexão com o BD.
include("../../configuration/connection.php");

// Variáveis que irão receber os dados via POST do formulário.
$id_funcionario = $_POST["id_funcionario"]; // ID do funcionário (usuário)
$id_cliente = $_POST["id_cliente"]; // ID do cliente
$id_veiculo = $_POST["id_veiculo"]; // ID do veículo
$data_transacao = $_POST["data_transacao"]; // Data da transação
$data_entrega = $_POST["data_entrega"]; // Data da entrega
$ativo = isset($_POST["ativo"]) ? $_POST["ativo"] : 1; // Default to 1 if 'ativo' is not set

// Verifica se já existe uma transação para o cliente e o veículo
$SQLVerificaTransacao = "
SELECT id_transacao
FROM transacao
WHERE id_cliente = '$id_cliente'
AND id_veiculo = '$id_veiculo'
AND ativo = 1;";  // Certificando-se de que a transação não foi cancelada (ativo = 1)

// Executa a consulta para verificar se a transação já existe
$consultaTransacao = mysqli_query($connect, $SQLVerificaTransacao);

// Verifica se houve retorno na consulta
if(mysqli_num_rows($consultaTransacao) > 0){
    // Encerra a conexão com o BD.
    mysqli_close($connect);

    // Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "Esta transação já foi registrada com esse cliente e veículo!";

    // Redireciona o usuário para a página de formulário de criação de transação
    header("location: form-create-transicion.php");
    exit;  // Evita que o script continue
} else {
    // Verifica se o 'id_funcionario' existe na tabela 'funcionario'
    $SQLCheckFuncionario = "SELECT id_funcionario FROM funcionario WHERE id_funcionario = '$id_funcionario'";
    $resultFuncionario = mysqli_query($connect, $SQLCheckFuncionario);
    
    if (mysqli_num_rows($resultFuncionario) == 0) {
        // Encerra a conexão com o BD.
        mysqli_close($connect);
        
        // Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Funcionário não encontrado!";
        
        // Redireciona o usuário para a página de formulário de transação
        header("location: form-create-transicion.php");
        exit;  // Evita que o script continue
    }

    // Verifica se o 'id_cliente' existe na tabela 'cliente'
    $SQLCheckCliente = "SELECT id_cliente FROM cliente WHERE id_cliente = '$id_cliente'";
    $resultCliente = mysqli_query($connect, $SQLCheckCliente);
    
    if (mysqli_num_rows($resultCliente) == 0) {
        // Encerra a conexão com o BD.
        mysqli_close($connect);
        
        // Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Cliente não encontrado!";
        
        // Redireciona o usuário para a página de formulário de transação
        header("location: form-create-transicion.php");
        exit;  // Evita que o script continue
    }

    // Verifica se o 'id_veiculo' existe na tabela 'veiculo'
    $SQLCheckVeiculo = "SELECT id_veiculo FROM veiculo WHERE id_veiculo = '$id_veiculo'";
    $resultVeiculo = mysqli_query($connect, $SQLCheckVeiculo);
    
    if (mysqli_num_rows($resultVeiculo) == 0) {
        // Encerra a conexão com o BD.
        mysqli_close($connect);
        
        // Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Veículo não encontrado!";
        
        // Redireciona o usuário para a página de formulário de transação
        header("location: form-create-transicion.php");
        exit;  // Evita que o script continue
    }

    // Prepare a SQL de inserção de dados na tabela 'transacao'
    $stmt = $connect->prepare("INSERT INTO transacao (id_funcionario, id_cliente, id_veiculo, data_transacao, data_entrega, ativo) 
                              VALUES ('" . $id_funcionario . "', 
                    '" . $id_cliente . "', 
                    '" . $id_veiculo . "', 
                    '" . $data_transacao . "', 
                    '" . $data_entrega . "', 
                    1)");
                         

    
    // Executa a inserção
    if ($stmt->execute()) {
        // Encerra a conexão com o BD.
        mysqli_close($connect);

        // Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Transação cadastrada com sucesso!";

        // Redireciona o usuário para a página de formulário de transação
        header("location: form-create-transicion.php");
    } else {
        // Exibe o erro detalhado
        $_SESSION['retorno'] = "Erro ao inserir a transação: " . $stmt->error;

        // Redireciona o usuário para a página de formulário de transação
        header("location: form-create-transicion.php");
    }

    // Encerra a declaração preparada
    $stmt->close();
}
?>
