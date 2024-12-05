<?php
// Incluir a conexão e verificar o login
include("../../configuration/user-session.php");
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Registro de Transação</title>

    <!-- Link de referência ao CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Link para o jQuery (necessário para o AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php
  // Chamada do header
  include("header.php");
?>



<!-- Seção de Formulário -->
<section class="container py-5 text-center">
  <h2>Cadastrar Transação de Venda</h2>
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
</section>

<!-- Formulário de cadastro de transação -->
<section class="container">
  <div class="row">
    <form action="proccess-create-transicion.php" method="POST" class="row">
  
      <!-- Seleção de cliente -->
      <div class="row">
          <div class="col-6 my-3">
              <label for="id_cliente" class="form-label">Cliente</label>
              <input type="text" class="form-control" id="id_cliente" name="id_cliente">
          </div>
      </div>
  
      <!-- Seleção de Funcionário -->
      <div class="row">
          <div class="col-6 my-3">
              <label for="id_funcionario" class="form-label">Funcionário</label>
              <input type="text" class="form-control" id="id_funcionario" name="id_funcionario">
          </div>
      </div>
  
      <!-- Seleção de veículo -->
      <div class="row">
          <div class="col-6 my-3">
              <label for="id_veiculo" class="form-label">Veículo</label>
              <input type="text" class="form-control" id="id_veiculo" name="id_veiculo">
          </div>
      </div>
  
      <!-- Data da transação -->
      <div class="col-md-6 col-12 my-3">
        <label for="data_transacao" class="form-label">Data da Transação</label>
        <input type="date" class="form-control" id="data_transacao" name="data_transacao" required>
      </div>
  
      <!-- Data de entrega -->
      <div class="col-md-6 col-12 my-3">
        <label for="data_entrega" class="form-label">Data de Entrega</label>
        <input type="date" class="form-control" id="data_entrega" name="data_entrega" required>
      </div>
  
      <!-- Botão para salvar -->
      <div class="col-12 my-3">
        <button type="submit" class="btn btn-success">Registrar Transação</button>
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

<!-- Link de referência ao JS do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>