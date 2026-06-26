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
                <h3 class="mb-0">Cadastro de Veículo Aéreo</h3>
            </div>

            <div class="card-body">
                <form action="salvar_aereo.php" method="POST">
                    <input type="hidden" name="veaIdVeiculo" value="<?= $_GET['idVeiculo'] ?>">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="veaMatriculaAnac" class="form-label">
                                Matrícula ANAC *
                            </label>
                            <input type="text" class="form-control" id="veaMatriculaAnac" name="veaMatriculaAnac"
                                maxlength="7" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="veaPrefixoRadio" class="form-label">Prefixo da Rádio *</label>
                            <input type="text" class="form-control" id="veaPrefixoRadio" name="veaPrefixoRadio"
                                maxlength="40" required>
                        </div>

                        <div class="col-md-6">
                            <label for="veacapacidadePessoas" class="form-label">Capacidade de Pessoas *</label>
                            <input type="number" id="veacapacidadePessoas" name="veacapacidadePessoas"
                                class="form-control" min="1" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="veaAutonomiaVoo" class="form-label">
                                Autonomia de Voo *
                            </label>
                            <input type="number" class="form-control" id="veaAutonomiaVoo" name="veaAutonomiaVoo"
                                min="1" required>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-4">
                            <label for="veaPossuiKitMedico" class="form-label">
                                Possui kit médico?
                            </label>
                            <input type="radio" class="form-check-input" id="veaPossuiKitMedico" name="veaPossuiKitMedico"
                                value="Sim" required>
                            <label for="veaPossuiKitMedico" class="form-check-label">
                                Sim
                            </label>
                            <input type="radio" class="form-check-input" id="veaPossuiKitMedico" name="veaPossuiKitMedico"
                                value="Nao" required>
                            <label for="veaPossuiKitMedico" class="form-check-label">
                                Não
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label for="veaPossuiMaca" class="form-label">
                                Possui maca?
                            </label>
                            <input type="radio" class="form-check-input" id="veaPossuiMaca" name="veaPossuiMaca"
                                value="Sim" required>
                            <label for="veaPossuiMaca" class="form-check-label">
                                Sim
                            </label>
                            <input type="radio" class="form-check-input" id="veaPossuiMaca" name="veaPossuiMaca"
                                value="Nao" required>
                            <label for="veaPossuiMaca" class="form-check-label">
                                Não
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label for="veaPossuiOxigenio" class="form-label">
                                Possui oxigênio?
                            </label>
                            <input type="radio" class="form-check-input" id="veaPossuiOxigenio" name="veaPossuiOxigenio"
                                value="Sim" required>
                            <label for="veaPossuiOxigenio" class="form-check-label">
                                Sim
                            </label>
                            <input type="radio" class="form-check-input" id="veaPossuiOxigenio" name="veaPossuiOxigenio"
                                value="Nao" required>
                            <label for="veaPossuiOxigenio" class="form-check-label">
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