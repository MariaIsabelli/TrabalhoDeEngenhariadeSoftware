<?php
// Chamada de inclusão do arquivo de conexão com o BD.
include("../../configuration/connection.php");

// Chamada para o arquivo que verifica se o usuário está logado.
include("../../configuration/user-session.php");

// Recupera o ID do usuário via método GET.
$id = $_GET["id"];

// Instrução SQL que puxa os dados do usuário.
$SQL = "SELECT nome, cpf, data_nascimento, telefone, genero, endereco FROM cliente WHERE id_cliente = $id;";

// Executa a instrução SQL.
$consulta = mysqli_query($connect, $SQL);

// Criar um array, para exibir as informações do usuário.
$usuario = mysqli_fetch_assoc($consulta);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Edição de Cadastro de Usuário</title>

    <!-- Link de referência ao CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<?php
  //Chamada o header.
  include("header.php");
  ?>

<!-- Seção do formulário -->
<section class="container py-5">
    <div class="row justify-content-center">

        <!-- Captura e apresenta os retornos para o usuário -->
        <div class="row mb-4">
            <div class="text-center">
                <?php 
                // Verifica se existe alguma mensagem de retorno.
                if (isset($_SESSION['retorno'])) {
                    // Apresenta a mensagem de retorno para o usuário.
                    echo $_SESSION['retorno'];
                    // Deleta a variável de sessão.
                    unset($_SESSION['retorno']);
                }
                ?>
            </div>
        </div>

        <form action="proccess-edit-client.php" method="post" class="row">
            <!-- Nome e CPF -->
            <div class="row">
                <div class="col-2 my-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php print($id); ?>" readonly>
                </div>
                <div class="col-6 my-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>">
                </div>
                <div class="col-6 my-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($usuario['cpf']); ?>">
                </div>
            </div>

            <!-- Data de nascimento e gênero -->
            <div class="row">
                <div class="col-8 my-3">
                    <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?php echo htmlspecialchars($usuario['data_nascimento']); ?>">
                </div>
                <div class="col-4 my-3">
                    <label for="genero" class="form-label">Gênero</label>
                    <select id="genero" name="genero" class="form-select">
                        <option value="">Selecione o gênero...</option>
                        <option value="M" <?php echo $usuario['genero'] == 'M' ? 'selected' : ''; ?>>Masculino</option>
                        <option value="F" <?php echo $usuario['genero'] == 'F' ? 'selected' : ''; ?>>Feminino</option>
                        <option value="N" <?php echo $usuario['genero'] == 'N' ? 'selected' : ''; ?>>Não informar</option>
                    </select>
                </div>
            </div>

            <!-- Endereço e telefone -->
            <div class="row">
                <div class="col-6 my-3">
                    <label for="logradouro" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($usuario['endereco']); ?>">
                </div>
                <div class="col-6 my-3">
                    <label for="celular" class="form-label">Celular com DDD</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>">
                </div>
            </div>

            <!-- Botão de voltar e de salvar -->
            <div class="row">
                <div class="col-12 my-3">
                    <a href="proccess-list-client.php" class="btn btn-primary">Voltar</a>
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

<?php 
// Encerra a conexão com o BD.
mysqli_close($connect);
?>
