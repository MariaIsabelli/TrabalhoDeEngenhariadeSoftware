<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Diel - Início</title>

    <!-- Link de referência ao CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .hero {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .feature-icon {
            font-size: 50px;
            color: #28a745;
        }
        .feature-box {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .feature-box:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- Cabeçalho do website -->
<header class="w-100">
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <img src="imgs/icons8-carro-64.png" alt="logo carro">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
                <a class="fw-bold d-flex nav-link text-light" href="index.php">Início</a>
                <a class="fw-bold d-flex nav-link text-light" href="login/form-login.php">Login</a>
            </div>
        </div>
    </nav>
</header>


   <!-- Seção Carrossel -->
<section id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="imgs/headerCar.jpg" class="d-block custom-carousel-img" alt="Carro 1">
        </div>
        <div class="carousel-item">
            <img src="imgs/headerCar2.jpg" class="d-block custom-carousel-img" alt="Carro 2">
        </div>
        <div class="carousel-item">
            <img src="imgs/headerCar3.jpg" class="d-block custom-carousel-img" alt="Carro 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
    </button>
</section>


<style>
    .custom-carousel-img {
        max-height: 300px; /* Ajuste a altura conforme necessário */
        width: 100%; /* Faz a imagem ocupar toda a largura */
        object-fit: cover; /* Mantém a proporção da imagem */
    }
</style>



    <!-- Seção Hero -->
    <section class="hero text-center py-5">
        <div class="container">
            <h1 class="text-center text-success mb-4">Bem-vindo ao Motor Diel!</h1>
            <p class="text-center mb-4">O melhor lugar para comprar e vender seu carro.</p>
            <a href="login/form-login.php" class="btn btn-success btn-lg">Comece Agora</a>
        </div>
    </section>

    <!-- Seção de Funcionalidades -->
    <section class="container py-5">
        <h2 class="text-center text-success mb-4">Nossas Funcionalidades</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-box p-3">
                    <div class="feature-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h4>Compra de Carros</h4>
                    <p>Encontre uma ampla variedade de veículos de diferentes marcas e modelos.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box p-3">
                    <div class="feature-icon">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <h4>Venda Rápida</h4>
                    <p>Venda seu carro de forma fácil e rápida com nosso suporte especializado.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box p-3">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h4>Financiamento</h4>
                    <p>Consulte nossas opções de financiamento para facilitar sua compra.</p>
                </div>
            </div>
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

<!-- Link do Font Awesome para ícones -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <!-- Link de referência ao JS do Bootstrap -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
