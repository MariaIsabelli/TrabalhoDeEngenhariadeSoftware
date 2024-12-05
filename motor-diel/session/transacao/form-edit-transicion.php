<?php
// Inclusão do arquivo de conexão com o banco de dados
include("../../configuration/connection.php");

// Inclusão para verificar se o usuário está logado
include("../../configuration/user-session.php");

// Recupera o ID da transação via GET
$id_transacao = isset($_GET["id_transacao"]) ? $_GET["id_transacao"] : null;

// Verifica se o ID da transação foi passado
if ($id_transacao) {
    // Consulta para buscar os dados da transação
    $SQL = "
    SELECT t.id_transacao, t.data_transacao, t.data_entrega, t.ativo,
    u.nome AS usuario_nome, c.nome AS cliente_nome, v.modelo AS veiculo_modelo
    FROM transacao t
    JOIN funcionario u ON t.id_funcionario = u.id_funcionario
    JOIN cliente c ON t.id_cliente = c.id_cliente
    JOIN veiculo v ON t.id_veiculo = v.id_veiculo
    WHERE t.id_transacao = $id_transacao;
    ";

    // Executa a consulta
    $consulta = mysqli_query($connect, $SQL);

    // Verifica se a consulta retornou algum resultado
    if ($consulta && mysqli_num_rows($consulta) > 0) {
        $transacao = mysqli_fetch_assoc($consulta);
    } else {
        echo "Transação não encontrada.";
        exit; // Encerra o script caso a transação não seja encontrada
    }
} else {
    echo "ID da transação não fornecido.";
    exit; // Encerra o script caso o ID não seja passado
}
?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Motor Diell - Edição de Transação</title>
<!-- Link para o CSS do Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<?php
  // Chamada ao header
  include("header.php");
?>

<!-- Formulário de Edição -->
<section class="container py-5">
<div class="row justify-content-center">
<form action="proccess-edit-transacao.php" method="post" class="row">

<!-- ID da transação -->
<div class="col-12 my-3">
<label for="id_transacao" class="form-label">ID da Transação</label>
<input type="text" class="form-control" id="id_transacao" name="id_transacao" value="<?php echo $transacao['id_transacao']; ?>">
</div>

<!-- Funcionário -->
<div class="col-6 my-3">
<label for="id_usuario" class="form-label">Funcionário</label>
<input type="text" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $transacao['usuario_nome']; ?>">
</div>

<!-- Cliente -->
<div class="col-6 my-3">
<label for="id_usuario" class="form-label">Cliente</label>
<input type="text" class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $transacao['cliente_nome']; ?>">
</div>

</select>
</div>

<!-- Veículo -->
<div class="col-6 my-3">
<label for="id_usuario" class="form-label">Veículo</label>
<input type="text" class="form-control" id="id_veiculo" name="id_veiculo" value="<?php echo $veiculo['modelo']; ?>">
</div>


<div class="col-6 my-3">
<label for="id_veiculo" class="form-label">Veículo</label>
<select id="id_veiculo" name="id_veiculo" class="form-select">
<!-- Você pode adicionar os veículos no select -->
<?php
// Consulta para obter todos os veículos
$veiculos_sql = "SELECT id_veiculo, modelo FROM veiculo";
$veiculos_result = mysqli_query($connect, $veiculos_sql);
while ($veiculo = mysqli_fetch_assoc($veiculos_result)) {
  $selected = ($veiculo['id_veiculo'] == $transacao['id_veiculo']) ? 'selected' : '';
  echo "<option value='{$veiculo['id_veiculo']}' $selected>{$veiculo['modelo']}</option>";
}
?>
</select>
</div>

<!-- Data da transação -->
<div class="col-6 my-3">
<label for="data_transacao" class="form-label">Data da Transação</label>
<input type="date" class="form-control" id="data_transacao" name="data_transacao" value="<?php echo $transacao['data_transacao']; ?>">
</div>

<!-- Data de entrega -->
<div class="col-6 my-3">
<label for="data_entrega" class="form-label">Data de Entrega</label>
<input type="date" class="form-control" id="data_entrega" name="data_entrega" value="<?php echo $transacao['data_entrega']; ?>">
</div>

<!-- Botões de Salvar e Voltar -->
<div class="col-12 my-3">
<a href="proccess-list-transacoes.php" class="btn btn-primary">Voltar</a>
<button type="submit" class="btn btn-success">Salvar</button>
</div>

</form>
</div>
</section>

 <!-- Footer -->
 <footer class="bg-success text-white text-center py-4">
    <div class="container">
        <p class="mb-1">© 2024 Motor Diel. Todos os direitos reservados.</p>
        <p>Faculdade de Tecnologia - FATEC - Botucatu (SP)</p>
        <div>
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>

<!-- Link para o JS do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Fecha a conexão com o banco de dados
mysqli_close($connect);
?>
