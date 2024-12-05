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
                  <li><a class="dropdown-item" href="../../session/user/form-create-user.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="../../session/user/proccess-list-users.php">Listar</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Clientes
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../../session/client/form-create-client.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="../../session/client/proccess-list-client.php">Listar</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Veículos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../../session/car/form-create-car.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="../../session/car/proccess-list-car.php">Listar</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Transações
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../../session/transacao/form-create-transicion.php">Efetuar Transação</a></li>
                  <li><a class="dropdown-item" href="../../session/transacao/proccess-list-transicion.php">Listar Transação</a></li>
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