<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Login</title>

    <!-- Link de referência ao CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .header {
            background-color: #28a745;
            color: white;
            padding: 20px;
        }
        .login-form {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Cabeçalho do website -->
    <header class="w-100">
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container">
                <img src="../imgs/icons8-carro-64.png" alt="logo carro">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav">
                    <a class="fw-bold d-flex nav-link text-light" href="../index.php">Início</a>
                </div>
            </div>
        </nav>
    </header>

    <?php
      // Verifica se a variável 'retorno' existe antes de usá-la
      if (isset($_GET["retorno"])) {
          $retorno = $_GET["retorno"];
          echo '
          <div class="container">
            <div class="alert alert-warning text-center" role="alert">
              ' . htmlspecialchars($retorno) . '
            </div>
          </div>
          ';
      }
    ?>

    <!-- Seção do formulário -->
    <section class="container py-5">
        <div class="row justify-content-center">
            <form action="proccess-login.php" method="post" class="login-form col-12 col-md-6">
                <h3 class="text-center mb-4">Login</h3>

                <!-- E-mail -->
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Senha -->
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <!-- Lembrar-me -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar">
                    <label class="form-check-label" for="lembrar">Lembrar-me</label>
                </div>

                <button type="submit" class="btn btn-success w-100">Entrar</button>
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
