<?php
  //Chamada para o arquivo que verifica se o usuário está logado.
  include("../../configuration/user-session.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Cadastro de Veículo</title>

    <!-- Link de referência ao CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  <?php
  //Chamada o header.
  include("header.php");
  ?>

    <!-- Seção que apresentará a mensagem para o usuário -->
    <section class="container py-5 text-center">
      <?php
        //Verifica se existe alguma mensagem de retorno.
        if(isset($_SESSION['retorno'])){

          //Apresenta a mensagem de retorno para o usuário.
          print($_SESSION['retorno']);

          //Deleta a variável de sessão.
          unset($_SESSION['retorno']);
        }else{

          //Apresenta uma mensagem.
          print("Preencha com as informações do novo veículo...");

        }
      ?>
    </section>

    <!-- Seção do formulário -->
    <section class="container">
        <div class="row">
            <form action="proccess-create-car.php" method="post" class="row">
                
                <!-- Marca, Modelo e Ano -->
                <div class="row">
                    <div class="col-4 my-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca">
                    </div>
                    <div class="col-4 my-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo">
                    </div>
                    <div class="col-4 my-3">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" class="form-control" id="ano" name="ano">
                    </div>
                </div>

                <!-- Cor, Placa e Renavam -->
                <div class="row">
                    <div class="col-4 my-3">
                        <label for="cor" class="form-label">Cor</label>
                        <input type="text" class="form-control" id="cor" name="cor">
                    </div>
                    <div class="col-4 my-3">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" class="form-control" id="placa" name="placa">
                    </div>
                
                    <div class="col-6 my-3">
                        <label for="valor" class="form-label">Valor (R$)</label>
                        <input type="number" step="0.01" class="form-control" id="valor" name="valor">
                    </div>
                </div>

                <!-- Botão de cadastrar -->
                <div class="row">
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-success">Salvar Veículo</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
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
