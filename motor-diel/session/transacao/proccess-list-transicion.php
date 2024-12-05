<?php
include("../../configuration/connection.php");
include("../../configuration/user-session.php");
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Motor Diel - Listagem de Transações</title>

    <!-- Biblioteca para geração de PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<?php
  //Chamada o header.
  include("header.php");
  ?>

<section class="container py-5">
<div class="row">
<div class="row align-items-center">
<div class="text-center">
<?php
if(isset($_SESSION['retorno'])){
  print($_SESSION['retorno']);
  unset($_SESSION['retorno']);
}
?>
</div>
</div>

<div class="mx-auto mt-5" id="content">
<table class="text-center table table-bordered">
<thead>
<tr>
<th scope="col">ID Transação</th>
<th scope="col">Funcionário</th>
<th scope="col">Cliente</th>
<th scope="col">Veículo</th>
<th scope="col">Data da Transação</th>
<th scope="col">Data de Entrega</th>
<th scope="col">Status</th>
<th scope="col">Visualizar</th>
<th scope="col">Editar</th>
<th scope="col">Excluir</th>
</tr>
</thead>
<tbody>

<?php
include("../../configuration/connection.php");

$SQL = "SELECT t.id_transacao, t.id_funcionario, t.id_cliente, t.id_veiculo, t.data_transacao, t.data_entrega, t.ativo, 
        f.nome AS funcionario_nome, c.nome AS cliente_nome, v.marca AS veiculo_marca
        FROM transacao t
        JOIN funcionario f ON t.id_funcionario = f.id_funcionario
        JOIN cliente c ON t.id_cliente = c.id_cliente
        JOIN veiculo v ON t.id_veiculo = v.id_veiculo";

$consulta = mysqli_query($connect, $SQL);

if (mysqli_num_rows($consulta) > 0){
  while ($transacao = mysqli_fetch_assoc($consulta)){
    ?>
    <tr>
    <th scope="row"><?php print($transacao["id_transacao"]); ?></th>
    <td><?php print($transacao["funcionario_nome"]); ?></td>
    <td><?php print($transacao["cliente_nome"]); ?></td>
    <td><?php print($transacao["veiculo_marca"]); ?></td>
    <td><?php print($transacao["data_transacao"]); ?></td>
    <td><?php print($transacao["data_entrega"]); ?></td>
    <td><?php echo ($transacao["ativo"] == 1) ? "Ativa" : "Inativa"; ?></td>
    <td><a href="form-view-transicion.php?id_transacao=<?php print($transacao["id_transacao"]); ?>"><i class="bi bi-eye-fill"></i></a></td>
    <td><a href="form-edit-transicion.php?id_transacao=<?php print($transacao["id_transacao"]); ?>"><i class="bi bi-pencil-square"></i></a></td>
    <td><a href="proccess-delete-transicion.php?id_transacao=<?php print($transacao["id_transacao"]); ?>"><i class="bi bi-trash3-fill"></i></a></td>
    </tr>
    <?php
  }
  mysqli_close($connect);
} else {
  print("Não existem transações registradas no banco de dados.");
  mysqli_close($connect);
}
?>

</tbody>
</table>
</div>
</div>

<button id="download">Baixar PDF</button>
</section>

<footer class="bg-success text-white text-center py-4">
<div class="container">
<p class="mb-1">© 2024 Motor Diel. Todos os direitos reservados.</p>
<p>Faculdade de Tecnologia - FATEC - Botucatu (SP)</p>
<div>
</div>
</div>
</footer>

<script>
        document.getElementById('download').addEventListener('click', () => {
            const element = document.getElementById('content');
            html2pdf().from(element).save();
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
