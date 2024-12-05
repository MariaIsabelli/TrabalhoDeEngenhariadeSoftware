<?php
//Chamada para o arquivo de conexão com o BD.
include("../../configuration/connection.php");

//Chamada para o arquivo que verifica se o usuário está logado.
include("../../configuration/user-session.php");

//Recupera o ID da transação via método GET.
$id_transacao = $_GET["id_transacao"];

// Instrução SQL para buscar os detalhes da transação, incluindo informações do cliente, usuário e veículo
$SQL = "
SELECT t.id_transacao, t.data_transacao, t.data_entrega, t.ativo,
u.nome AS usuario_nome, c.nome AS cliente_nome, v.modelo AS veiculo_modelo
FROM transacao t
JOIN funcionario u ON t.id_funcionario = u.id_funcionario  -- Corrigido aqui
JOIN cliente c ON t.id_cliente = c.id_cliente
JOIN veiculo v ON t.id_veiculo = v.id_veiculo
WHERE t.id_transacao = $id_transacao;
";


// Executa a instrução SQL
$consulta = mysqli_query($connect, $SQL);

// Verifica se a consulta retornou resultados
if ($consulta) {
  // Recupera as informações da transação
  $transacao = mysqli_fetch_assoc($consulta);
} else {
  echo "Erro ao buscar os dados da transação.";
  exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Motor Diell - Detalhes da Transação</title>

<!-- Link de referência ao CSS do Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- Link de referência do CSS de Icones do Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>

<?php
  //Chamada o header.
  include("header.php");
  ?>

<!-- Seção do formulário -->
<section class="container py-5">
<div class="row justify-content-center">

<form class="row">

<!-- ID da Transação, Nome do Cliente e Nome do Funcionário -->
<div class="row">
<div class="col-4 my-3">
<label for="idTransacao" class="form-label">ID da Transação</label>
<input type="text" class="form-control" id="idTransacao" name="idTransacao" value="<?php echo $transacao['id_transacao']; ?>" readonly>
</div>
<div class="col-4 my-3">
<label for="cliente" class="form-label">Cliente</label>
<input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo $transacao['cliente_nome']; ?>" readonly>
</div>
<div class="col-4 my-3">
<label for="funcionario" class="form-label">Funcionário</label>
<input type="text" class="form-control" id="funcionario" name="funcionario" value="<?php echo $transacao['usuario_nome']; ?>" readonly>
</div>
</div>

<!-- Modelo do Veículo e Data da Transação -->
<div class="row">
<div class="col-4 my-3">
<label for="veiculo" class="form-label">Veículo</label>
<input type="text" class="form-control" id="veiculo" name="veiculo" value="<?php echo $transacao['veiculo_modelo']; ?>" readonly>
</div>
<div class="col-4 my-3">
<label for="dataTransacao" class="form-label">Data da Transação</label>
<input type="date" class="form-control" id="dataTransacao" name="dataTransacao" value="<?php echo $transacao['data_transacao']; ?>" readonly>
</div>
<div class="col-4 my-3">
<label for="dataEntrega" class="form-label">Data de Entrega</label>
<input type="date" class="form-control" id="dataEntrega" name="dataEntrega" value="<?php echo $transacao['data_entrega']; ?>" readonly>
</div>
</div>

<!-- Ativo (Status da transação) -->
<div class="row">
<div class="col-12 my-3">
<label for="ativo" class="form-label">Ativo</label>
<input type="text" class="form-control" id="ativo" name="ativo" value="<?php echo $transacao['ativo'] == 1 ? 'Ativo' : 'Inativo'; ?>" readonly>
</div>
</div>

<!-- Botão de voltar -->
<div class="row">
<div class="col-12 my-3">
<a href="proccess-list-transicion.php" class="btn btn-primary">Voltar</a>
</div>
</div>

</form>

</div>
</section>

<!-- Footer -->
<footer class="bg-success text-white text-center py-4">
<div class="container">
<p class="mb-1">© 2024 Motor Diel. Todos os direitos reservados.</p>
<p>Faculdade de Tecnologia - FATEC - Botucatu (SP)</p>
</div>
</footer>

<!-- Link de referência ao JS do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Encerra a conexão com o BD
mysqli_close($connect);
?>
