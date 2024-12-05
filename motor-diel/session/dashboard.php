<?php
  //Chamada para o arquivo que verifica se o usuário está logado.
  include("../configuration/user-session.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Dashboard</title>

    <!-- Link de referência ao CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
   <!-- Menu do website -->
 <nav class="navbar navbar-expand-lg bg-success" id="navbarSupportedContent">
        <div class="container-fluid">
          <a class="text-uppercase navbar-brand text-light" href="../dashboard.php">Dashboard</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <!-- Itens dropdown do menu interno -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Funcionários
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../session/user/form-create-user.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="../session/user/proccess-list-users.php">Listar</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Clientes
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../session/client/form-create-client.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="../session/client/proccess-list-client.php">Listar</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Veículos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../session/car/form-create-car.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="../session/car/proccess-list-car.php">Listar</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Transações
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../session/transacao/form-create-transicion.php">Efetuar Transação</a></li>
                  <li><a class="dropdown-item" href="../session/transacao/proccess-list-transicion.php">Listar Transação</a></li>
                </ul>
              </li>

              

            </ul>

          </div>

          <!-- Itens alinhados a direita do menu interno -->
          <div class="navbar-nav">
            <a class="fw-bold d-flex nav-link text-light" href="exit.php">Sair</a>
          </div>

        </div>
    </nav>
  
    <!-- Seção do formulário -->
    <section class="container py-5">

      <div class="row justify-content-center">

        <div class="mx-auto text-center">
            <?php
              //Verifica se existe alguma mensagem de retorno.
              if(isset($_SESSION['retorno'])){

                //Apresenta a mensagem de retorno para o usuário.
                print($_SESSION['retorno']);

                //Deleta a variável de sessão.
                unset($_SESSION['retorno']);
              }else{

                //Apresenta uma mensagem de boas-vindas para o usuário.
                print("Bem vindo a sessão restrita de funcionário!
                Dados cadastrados no sistema:");

              }
            ?>
        </div>

      </div>

    </section>

    <?php
// Chamada para o arquivo que verifica se o usuário está logado.
include("./../configuration/user-session.php");

// Incluir a conexão com o banco de dados
include("./../configuration/connection.php");

// Consultas para contar os registros
$sql_funcionario = "SELECT COUNT(*) AS total_funcionario FROM funcionario";
$result_funcionario = $connect->query($sql_funcionario);
$row_funcionario = $result_funcionario->fetch_assoc();
$total_funcionario = $row_funcionario['total_funcionario'];

$sql_cliente = "SELECT COUNT(*) AS total_cliente FROM cliente";
$result_cliente = $connect->query($sql_cliente);
$row_cliente = $result_cliente->fetch_assoc();
$total_cliente = $row_cliente['total_cliente'];

$sql_veiculo = "SELECT COUNT(*) AS total_veiculo FROM veiculo";
$result_veiculo = $connect->query($sql_veiculo);
$row_veiculo = $result_veiculo->fetch_assoc();
$total_veiculo = $row_veiculo['total_veiculo'];

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    <!-- Seu código de menu e sessão vai aqui... -->

    <!-- Gráficos Interativos -->
    <section class="container mt-5">
        <h1 class="text-center">Gráficos de Cadastros</h1>
        <br>
        <br>
        <div class="row mt-4">
            <!-- Gráfico de Funcionários -->
            <div class="col-md-4">
                <div id="chart_funcionario" style="width: 100%; height: 300px;"></div>
            </div>
            <!-- Gráfico de Clientes -->
            <div class="col-md-4">
                <div id="chart_cliente" style="width: 100%; height: 300px;"></div>
            </div>
            <!-- Gráfico de Veículos -->
            <div class="col-md-4">
                <div id="chart_veiculo" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            var data_funcionario = google.visualization.arrayToDataTable([
                ['Categoria', 'Quantidade'],
                ['Funcionário', <?php echo $total_funcionario; ?>]
                
            ]);
            var options_funcionario = { chart: {title: 'Número de Funcionário Cadastrados'}, bars: 'vertical' };
            var chart_funcionario = new google.charts.Bar(document.getElementById('chart_funcionario'));
            chart_funcionario.draw(data_funcionario, options_funcionario);

            var data_cliente = google.visualization.arrayToDataTable([
                ['Categoria', 'Quantidade'],
                ['Cliente', <?php echo $total_cliente; ?>]
            ]);
            var options_cliente = { chart: {title: 'Número de Cliente Cadastrados'}, bars: 'vertical' };
            var chart_cliente = new google.charts.Bar(document.getElementById('chart_cliente'));
            chart_cliente.draw(data_cliente, options_cliente);

            var data_veiculo = google.visualization.arrayToDataTable([
                ['Categoria', 'Quantidade'],
                ['Veículo', <?php echo $total_veiculo; ?>]
            ]);
            var options_veiculo = { chart: {title: 'Número de Veículo Cadastrados'}, bars: 'vertical' };
            var chart_veiculo = new google.charts.Bar(document.getElementById('chart_veiculo'));
            chart_veiculo.draw(data_veiculo, options_veiculo);
        }
    </script>
    <br>
    <br>
    <br>

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