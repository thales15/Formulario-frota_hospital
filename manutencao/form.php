<?php
require "../conection.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Cadastro de Manutenção</title>

    <style>
        body {
            background: #f5f5f5;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, .15);
        }

        .card-header {
            background: #0d6efd;
            color: white;
            font-size: 30px;
            font-weight: bold;
        }

        .table thead {
            background: #0d6efd;
            color: white;
        }
    </style>

</head>

<body>

    <?php include '../_inc/header.php'; ?>

    <div class="container mt-4">

        <div class="row">

            <!-- LISTA DOS VEÍCULOS -->

            <div class="col-lg-5">

                <div class="card">

                    <div class="card-header">
                        Veículos Disponíveis
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>Identificação</th>
                                    <th>KM Atual</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php
                                $sql = "SELECT * FROM tblveiculo WHERE veiStatus = 'Disponivel' ORDER BY idVeiculo";

                                $veiculos = $con->prepare($sql);
                                $veiculos->execute();

                                foreach ($veiculos as $v): ?>

                                    <tr>

                                        <td><?= $v['idVeiculo'] ?></td>

                                        <td><?= $v['veiTipoGeral'] ?></td>

                                        <td><?= $v['veiIdentificacaoPrincipal'] ?></td>

                                        <td><?= number_format($v['veiKmHorasAtual'], 0, ",", ".") ?></td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            <!-- FORM -->

            <div class="col-lg-7">

                <div class="card">

                    <div class="card-header">
                        Cadastro de Manutenção
                    </div>

                    <div class="card-body">

                        <form action="salvar.php" method="POST">

                            <div class="mb-3">

                                <label class="form-label">
                                    Veículo *
                                </label>

                                <select name="manIdVeiculo" class="form-select" required>

                                    <option value="">Selecione</option>

                                    <?php
                                    $sql = "SELECT * FROM tblveiculo WHERE veiStatus = 'Disponivel' ";

                                    $veiculos = $con->prepare($sql);
                                    $veiculos->execute();

                                    foreach ($veiculos as $opcao): ?>

                                        <option value="<?= $opcao['idVeiculo'] ?>">

                                            <?= $opcao['veiIdentificacaoPrincipal'] ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Tipo da Manutenção

                                    </label>

                                    <select name="manTipoManutencao" class="form-select">

                                        <option>Preventiva</option>

                                        <option>Corretiva</option>

                                    </select>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Data da Manutenção

                                    </label>

                                    <input type="date" name="manDataManutencao" class="form-control"
                                        value="<?= date('Y-m-d') ?>">
                                    <input type="hidden" name="manProximaManutencao" class="form-control"
                                        value="<?= date('Y-m-d', strtotime('+3 months')) ?>">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Descrição

                                </label>

                                <textarea name="manDescricao" class="form-control" rows="3"></textarea>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        KM/Horas da Manutenção

                                    </label>

                                    <input type="number" name="manKmHorasManutencao" class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Valor da Manutenção

                                    </label>

                                    <input type="number" name="manValor" class="form-control" step="0.01">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Oficina

                                </label>

                                <input type="text" name="manOficina" class="form-control">

                            </div>

                            <div class="text-end">

                                <button type="reset" class="btn btn-secondary">

                                    Limpar

                                </button>

                                <button type="submit" class="btn btn-success">

                                    Salvar Manutenção

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>