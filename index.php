<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículo</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Hospital Funerário Santa Maria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse row justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">cadastrar Veículo</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Visualizar veículos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Aéreos</a></li>
            <li><a class="dropdown-item" href="#">Terrestres</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Retirar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Cadastro de Veículo</h3>
        </div>

        <div class="card-body">
            <form action="salvar_veiculo.php" method="POST">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo Geral *</label>
                        <select class="form-select" id="tipo" name="tipo" required>
                            <option value="">Selecione</option>
                            <option value="Terrestre">Terrestre</option>
                            <option value="Aereo">Aéreo</option>
                            
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="placaIdentificacao" class="form-label">
                            Identificação Principal *
                        </label>
                        <input type="text"
                               class="form-control"
                               id="placaIdentificacao"
                               name="placaIdentificacao"
                               maxlength="7"
                               required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text"
                               class="form-control"
                               id="marca"
                               name="marca"
                               maxlength="40">
                    </div>

                    <div class="col-md-6">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text"
                               class="form-control"
                               id="modelo"
                               name="modelo"
                               maxlength="40">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="anoFabricacao" class="form-label">
                            Ano de Fabricação
                        </label>
                        <input type="date"
                               class="form-control"
                               id="anoFabricacao"
                               name="anoFabricacao">
                    </div>

                    <div class="col-md-4">
                        <label for="cor" class="form-label">Cor</label>
                        <input type="text"
                               class="form-control"
                               id="cor"
                               name="cor"
                               maxlength="20">
                    </div>

                    <div class="col-md-4">
                        <label for="kmAtual" class="form-label">
                            KM Atual
                        </label>
                        <input type="number"
                               class="form-control"
                               id="kmAtual"
                               name="kmAtual"
                               min="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Selecione</option>
                        <option value="Disponivel">Disponivel</option>
                        <option value="Utilizando">utilizando</option>
                        <option value="Manutenção">Manutenção</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-secondary">
                        Limpar
                    </button>

                    <button type="submit" class="btn btn-success">
                        Salvar Veículo
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 