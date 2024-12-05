<?php
  //Chamada para o arquivo de conexão com o BD.
  include("../../configuration/connection.php");

  //Chamada para o arquivo que verifica se o usuário está logado.
  include("../../configuration/user-session.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Listagem de funcionario</title>

    <!-- Biblioteca para geração de PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <section class="container py-5" id="content">

      <div class="row">

        <!-- Captura e apresenta os retornos para o usuário -->
        <div class="row align-itens-center">
          <div class="text-center">
            <?php 
              //Verifica se existe alguma mensagem de retorno.
              if(isset($_SESSION['retorno'])){

                //Apresenta a mensagem de retorno para o usuário.
                print($_SESSION['retorno']);

                //Deleta a variável de sessão.
                unset($_SESSION['retorno']);
              }
            ?>
          </div>
        </div>  

        <div class="mx-auto mt-5">

            <!-- Tabela que exibe os usuários -->
            <table class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Visualizar</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>

                  <?php
                  

                    //Instrução SQL de seleção dos usuários.
                    $SQL = "SELECT id_funcionario, nome, cpf FROM funcionario WHERE ativo = 1;";

                    //Executa a consulta SQL.
                    $consulta = mysqli_query($connect, $SQL);

                    //Verifica se existem retornos na consulta SQL.
                    if (mysqli_num_rows($consulta) > 0){

                      //Laço de repetição dos usuários.
                      //Apresenta todos os usuários do BD.
                      while ($usuario = mysqli_fetch_assoc($consulta)){
                        ?>
                        <tr>
                          <th scope="row"><?php print($usuario["id_funcionario"]); ?></th>
                          <td><?php print($usuario["nome"]); ?></td>
                          <td><?php print($usuario["cpf"]); ?></td>
                          <td><a href="form-view-user.php?id=<?php print($usuario["id_funcionario"]); ?>"><i class="bi bi-eye-fill"></i></a></td>
                          <td><a href="form-edit-user.php?id=<?php print($usuario["id_funcionario"]); ?>"><i class="bi bi-pencil-square"></i></a></td>
                          <td><a href="proccess-delete-user.php?id=<?php print($usuario["id_funcionario"]); ?>"><i class="bi bi-trash3-fill"></i></a></td>
                        </tr>
                        <?php
                      }
                      
                      //Fecha a conexâo com o BD.
                      mysqli_close($connect);

                    }else{
                      //Retorna a mensagem para o usuário.
                      print("Não existem usuários cadastrados no banco de dados.");

                      //Fecha a conexão com o BD.
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
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>

<script>
        document.getElementById('download').addEventListener('click', () => {
            const element = document.getElementById('content');
            html2pdf().from(element).save();
        });
    </script>

   
    <!-- Link de referência ao JS do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>