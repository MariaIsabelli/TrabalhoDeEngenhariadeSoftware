<?php
// Chamada para o arquivo que verifica se o usuário está logado.
include("../../configuration/user-session.php");

// Chama o arquivo de conexão com o BD.
include("../../configuration/connection.php");

// Variáveis que irão receber os dados via POST do formulário.
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$ano = $_POST["ano"];
$placa = $_POST["placa"];
$cor = $_POST["cor"];
$valor = $_POST["valor"];

// Verifica se a placa do veículo já está cadastrada no BD
$SQLVerificaPlaca = "SELECT placa FROM veiculo WHERE placa = ?;";

// Prepara a consulta
$stmt = mysqli_prepare($connect, $SQLVerificaPlaca);
mysqli_stmt_bind_param($stmt, 's', $placa);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// Verifica se houve retorno na consulta 
if(mysqli_stmt_num_rows($stmt) > 0) {
    // Encerra a conexão com o BD.
    mysqli_close($connect);

    // Cria uma variável de retorno usando a sessão.
    $_SESSION['retorno'] = "Veículo já cadastrado!!";

    // Redireciona o usuário.
    header("location: form-create-car.php");
    exit();
} else {
    // Instrução SQL de inserção de dados no BD.
        $SQL = "INSERT INTO veiculo (marca, 
                                    modelo, 
                                    ano, 
                                    placa, 
                                    cor, 
                                    valor,  
                                    ativo)
                VALUES ('" . $marca . "', 
                '" . $modelo . "', 
                '" . $ano . "', 
                '" . $placa . "', 
                '" . $cor . "', 
                '" . $valor . "', 
                1);";

    // Prepara a inserção
    $stmtInsert = mysqli_prepare($connect, $SQL);
    if ($stmtInsert === false) {
        // Em caso de erro de preparação
        die('Erro ao preparar consulta:' . mysqli_error($connect));
    }
   

    // Faz a tentativa de inserção dos dados no BD.
    if (mysqli_stmt_execute($stmtInsert)) {
        // Encerra a conexão com o BD.
        mysqli_close($connect);

        // Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Veículo cadastrado com sucesso!!!";

        // Redireciona o usuário.
        header("location: form-create-car.php");
        exit();
    } else {
        // Encerra a conexão com o BD.
        mysqli_close($connect);

        // Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Não foi possível cadastrar o veículo!!!";

        // Redireciona o usuário.
        header("location: form-create-car.php");
        exit();
    }
}
?>
