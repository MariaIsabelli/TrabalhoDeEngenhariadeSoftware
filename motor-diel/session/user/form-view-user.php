<?php
  //Chamada para o arquivo de conexão com o BD.
  include("../../configuration/connection.php");

  //Chamada para o arquivo que verifica se o usuário está logado.
  include("../../configuration/user-session.php");

  //Recupera o ID do usuário via método GET.
  $id = $_GET["id"];

  //Instrução SQL que puxa os dados do usuário.
  $SQL = "SELECT nome, cpf, data_nascimento, genero, cep, logradouro, 
                 numero_residencia, complemento, bairro, cidade, estado,
                 codigo_area, numero_celular, email
          FROM funcionario
          WHERE id_funcionario = $id;";

   //Executa a instrução SQL.
   $consulta = mysqli_query($connect, $SQL);

   //Criar um array, para exibir as informações do usuário.
   $usuario = mysqli_fetch_assoc($consulta);
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Listagem de Usuários</title>

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
                
                <!-- ID, Nome e CPF -->
                <div class="row">
                    <div class="col-2 my-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php print($id); ?>" readonly>
                    </div>
                    <div class="col-5 my-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php print($usuario["nome"]); ?>" readonly>
                    </div>
                    <div class="col-5 my-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php print($usuario["cpf"]); ?>" readonly>
                    </div>
                </div>

                <!-- Data de nascimento e genêro -->
                <div class="row">
                    <div class="col-8 my-3">
                        <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?php print($usuario["data_nascimento"]); ?>" readonly>
                    </div>
                    <div class="col-4 my-3">
                        <label for="genero" class="form-label">Gênero</label>
                        <input type="text" class="form-control" id="genero" name="genero" value="<?php print($usuario["genero"]); ?>" readonly>
                    </div>
                </div>

                <!-- CEP, endereço e número da residência -->
                <div class="row">
                    <div class="col-4 my-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="<?php print($usuario["cep"]); ?>" readonly>
                    </div>
                    <div class="col-4 my-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php print($usuario["logradouro"]); ?>" readonly>
                    </div>
                    <div class="col-4 my-3">
                        <label for="numeroResidencia" class="form-label">Número da Residência</label>
                        <input type="text" class="form-control" id="numeroResidencia" name="numeroResidencia" value="<?php print($usuario["numero_residencia"]); ?>" readonly>
                    </div>
                </div>

                <!-- Complemento, bairro e cidade -->
                <div class="row">
                    <div class="col-4 my-3">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento" value="<?php print($usuario["complemento"]); ?>" readonly>
                    </div>
                    <div class="col-4 my-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="<?php print($usuario["bairro"]); ?>" readonly>
                    </div>
                    <div class="col-4 my-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="<?php print($usuario["cidade"]); ?>" readonly>
                    </div>
                </div>

                <!-- Estado, código de área e celular -->
                <div class="row">
                    <div class="col-4 my-3">
                        <label for="estado" class="form-label">UF</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="<?php print($usuario["estado"]); ?>" readonly>
                    </div>
                    <div class="col-4 my-3">
                        <label for="codigoArea" class="form-label">Código de Área</label>
                        <input type="text" class="form-control" id="codigoArea" name="codigoArea" value="<?php print($usuario["codigo_area"]); ?>" readonly>
                    </div>
                    <div class="col-4 my-3">
                        <label for="celular" class="form-label">Celular com DDD</label>
                        <input type="celular" class="form-control" id="celular" name="celular" value="<?php print($usuario["numero_celular"]); ?>" readonly>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="row">
                    <div class="col-12 my-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php print($usuario["email"]); ?>" readonly>
                    </div>
                </div>
                
                <!-- Botão de voltar e de salvar -->
                <div class="row">
                    <div class="col-12 my-3">
                        <a href="proccess-list-users.php" class="btn btn-primary">Voltar</a>
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
    //Encerra a conexão com o BD.
    mysqli_close($connect);
?>