<?php
  //Chamada para o arquivo que verifica se o usuário está logado.
  include("../../configuration/user-session.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Cadastro de Cliente</title>

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
          print("Preencha com as informações do novo cliente...");

        }
      ?>
    </section>

    <!-- Seção do formulário -->
    <section class="container">
        <div class="row">
            <form action="proccess-create-client.php" method="post" class="row">
                
                <!-- Nome e CPF -->
                <div class="row">
                    <div class="col-6 my-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="col-6 my-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf">
                    </div>
                </div>

                <!-- Data de nascimento e genero -->
                <div class="row">
                    <div class="col-8 my-3">
                        <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
                    </div>
                    <div class="col-4 my-3">
                        <label for="genero" class="form-label">Gênero</label>
                        <select id="genero" name="genero" class="form-select">
                          <option selected>Selecione o gênero...</option>
                          <option value="M">Masculino</option>
                          <option value="F">Feminino</option>
                          <option value="N">Não informar</option>
                        </select>
                    </div>
                </div>

                <!-- endereço e telefone -->
                        <div class="row">
                            <div class="col-6 my-3">
                                <label for="logradouro" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                            </div>
                            <div class="col-6 my-3">
                                <label for="celular" class="form-label">Celular com DDD</label>
                                <input type="tel" class="form-control" id="celular" name="celular">
                            </div>
                    </div>

                <!-- Botão de cadastrar -->
                <div class="row">
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-success">Salvar</button>
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