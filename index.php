<?php require "conection.php" ?>

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

<?php include "./_inc/header.php" ?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Cadastro de Veículo</h3>
        </div>

        <div class="card-body">
            <form action="salvar_veiculo.php" method="POST">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="veiTipoGeral" class="form-label">Tipo Geral *</label>
                        <select class="form-select" id="veiTipoGeral" name="veiTipoGeral" required>
                            <option value="">Selecione</option>
                            <option value="Terrestre">Terrestre</option>
                            <option value="Aereo">Aéreo</option>
                            
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="veiIdentificacaoPrincipal" class="form-label">
                            Identificação Principal *
                        </label>
                        <input type="text"
                               class="form-control"
                               id="veiIdentificacaoPrincipal"
                               name="veiIdentificacaoPrincipal"
                               maxlength="7"
                               required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="veiMarca" class="form-label">Marca</label>
                        <input type="text"
                               class="form-control"
                               id="veiMarca"
                               name="veiMarca"
                               maxlength="40">
                    </div>

                    <div class="col-md-6">
                        <label for="veiModelo" class="form-label">Modelo</label>
                        <input type="text"
                               class="form-control"
                               id="veiModelo"
                               name="veiModelo"
                               maxlength="40">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="veiAnoFabricacao" class="form-label">
                            Ano de Fabricação
                        </label>
                        <input type="date"
                               class="form-control"
                               id="veiAnoFabricacao"
                               name="veiAnoFabricacao">
                    </div>

                    <div class="col-md-4">
                        <label for="veiCor" class="form-label">Cor</label>
                        <input type="text"
                               class="form-control"
                               id="veiCor"
                               name="veiCor"
                               maxlength="20">
                    </div>

                    <div class="col-md-4">
                        <label for="veiKmHorasAtual" class="form-label">
                            KM Atual
                        </label>
                        <input type="number"
                               class="form-control"
                               id="veiKmHorasAtual"
                               name="veiKmHorasAtual"
                               min="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="veiStatus" class="form-label">Status</label>
                    <select class="form-select" id="veiStatus" name="veiStatus" require>
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