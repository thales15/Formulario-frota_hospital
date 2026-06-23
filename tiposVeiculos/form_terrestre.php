<?php 
    if(!isset($_GET['idVeiculo'])) {
        header('Location: ../index.php?signFail=true');
        exit;
    }
?>

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

<?php include "../_inc/header.php" ?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Cadastro de Veículo Terrestre</h3>
        </div>

        <div class="card-body">
            <form action="salvar_terrestre.php" method="POST">
                <input type="hidden" name="vetIdVeiculo" value="<?= $_GET['idVeiculo'] ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vetRenavam" class="form-label">
                            Renavam *
                        </label>
                        <input type="text"
                               class="form-control"
                               id="vetRenavam"
                               name="vetRenavam"
                               maxlength="7"
                               required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vetChassi" class="form-label">Chassi *</label>
                        <input type="text"
                               class="form-control"
                               id="vetChassi"
                               name="vetChassi"
                               maxlength="40"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="vetCombustivel" class="form-label">Combustível *</label>
                        <select class="form-select" id="vetCombustivel" name="vetCombustivel" required>
                            <option value="">Selecione</option>
                            <option value="Gasolina">Gasolina</option>
                            <option value="Álcool">Álcool</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vetTipoVeiculo" class="form-label">
                            Tipo do veículo *
                        </label>
                        <select class="form-select" id="vetTipoVeiculo" name="vetTipoVeiculo" required>
                            <option value="">Selecione</option>
                            <option value="Ambulancia">Ambulância</option>
                            <option value="Apoio">Apoio</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="vetNivelAmbulancia" class="form-label">Nível da Ambulância</label>
                        <select class="form-select" id="vetNivelAmbulancia" name="vetNivelAmbulancia">
                            <option value="">Selecione</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">

                    <div class="col-md-4">
                        <label for="vetPossuiMaca" class="form-label">
                            Possui maca?
                        </label>
                        <input type="radio"
                               class="form-check-input"
                               id="vetPossuiMaca"
                               name="vetPossuiMaca"
                               value="Sim"
                               required>
                        <label for="vetPossuiMaca" class="form-check-label">
                            Sim
                        </label>
                        <input type="radio"
                               class="form-check-input"
                               id="vetPossuiMaca"
                               name="vetPossuiMaca"
                               value="Não"
                               required>
                        <label for="vetPossuiMaca" class="form-check-label">
                            Não
                        </label>
                    </div>
                
                    <div class="col-md-4">
                        <label for="vetPossuiOxigenio" class="form-label">
                            Possui oxigênio?
                        </label>
                        <input type="radio"
                               class="form-check-input"
                               id="vetPossuiOxigenio"
                               name="vetPossuiOxigenio"
                               value="Sim"
                               required>
                        <label for="vetPossuiOxigenio" class="form-check-label">
                            Sim
                        </label>
                        <input type="radio"
                               class="form-check-input"
                               id="vetPossuiOxigenio"
                               name="vetPossuiOxigenio"
                               value="Não"
                               required>
                        <label for="vetPossuiOxigenio" class="form-check-label">
                            Não
                        </label>
                    </div>
              
                    <div class="col-md-4">
                        <label for="vetPossuiDesfibrilador" class="form-label">
                            Possui desfibrilador?
                        </label>
                        <input type="radio"
                               class="form-check-input"
                               id="vetPossuiDesfibrilador"
                               name="vetPossuiDesfibrilador"
                               value="Sim"
                               required>
                        <label for="vetPossuiDesfibrilador" class="form-check-label">
                            Sim
                        </label>
                        <input type="radio"
                               class="form-check-input"
                               id="vetPossuiDesfibrilador"
                               name="vetPossuiDesfibrilador"
                               value="Não"
                               required>
                        <label for="vetPossuiDesfibrilador" class="form-check-label">
                            Não
                        </label>
                    </div>
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