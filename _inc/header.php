<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Hospital Funerário Santa Maria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse row justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= $base_url ?>/index.php">Cadastrar Veículo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Enviar manutenção</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Visualizar veículos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= $base_url ?>/tiposVeiculos/lista_aereo.php">Aéreos</a></li>
            <li><a class="dropdown-item" href="<?= $base_url ?>/tiposVeiculos/lista_terrestre.php">Terrestres</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ações
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Retirar</a></li>
            <li><a class="dropdown-item" href="#">Devolver</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">