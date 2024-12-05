<?php
// Chamada para o arquivo de conexão com o BD.
include("../../configuration/connection.php");

// Chamada para o arquivo que verifica se o usuário está logado.
include("../../configuration/user-session.php");

// Recupera o ID do veículo via método GET.
$id = $_GET["id"];

// Instrução SQL que puxa os dados do veículo.
$SQL = "SELECT marca, modelo, ano, placa, cor, valor
        FROM veiculo
        WHERE id_veiculo = $id;";

// Executa a instrução SQL.
$consulta = mysqli_query($connect, $SQL);

// Criar um array para exibir as informações do veículo.
$veiculo = mysqli_fetch_assoc($consulta);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Visualização de Veículo</title>

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
            <!-- ID, Modelo e Marca -->
            <div class="row">
                <div class="col-2 my-3">
                    <label for="id_veiculo" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id_veiculo" name="id_veiculo" value="<?php print($id); ?>" readonly>
                </div>
                <div class="col-5 my-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php print($veiculo["modelo"]); ?>" readonly>
                </div>
                <div class="col-5 my-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="<?php print($veiculo["marca"]); ?>" readonly>
                </div>
            </div>

            <!-- Ano de fabricação e cor -->
            <div class="row">
                <div class="col-4 my-3">
                    <label for="ano_fabricacao" class="form-label">Ano de Fabricação</label>
                    <input type="text" class="form-control" id="ano" name="ano" value="<?php print($veiculo["ano"]); ?>" readonly>
                </div>
                <div class="col-4 my-3">
                    <label for="cor" class="form-label">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" value="<?php print($veiculo["cor"]); ?>" readonly>
                </div>
                <div class="col-4 my-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" value="<?php print($veiculo["placa"]); ?>" readonly>
                </div>
            </div>

            <!-- Botão de voltar -->
            <div class="row">
                <div class="col-12 my-3">
                    <a href="proccess-list-car.php" class="btn btn-primary">Voltar</a>
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
<?php 
// Encerra a conexão com o BD.
mysqli_close($connect);
?>
