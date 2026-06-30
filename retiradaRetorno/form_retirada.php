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
                        Registro de Saída
                    </div>

                    <div class="card-body">

                        <form action="salvar_retirada.php" method="POST">
                            
                        <label class="form-label">Motorista</label>
                        <select name="srvIdMotorista" class="form-select" required>
                            <option value="">Selecione</option>
                            <?php
                            $sql = "SELECT f.funNome, m.idMotorista FROM tblmotorista m INNER JOIN tblfuncionario f ON m.motIdFuncionario = f.idFuncionario WHERE m.motStatus = 'Ativo' ";
                            $motoristas = $con->prepare($sql);
                            $motoristas->execute();
                            foreach ($motoristas as $opcao): ?>
                                <option value="<?= $opcao['idMotorista'] ?>">
                                    <?= $opcao['funNome'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                            <div class="row">
                                <div class="mb-3 col-md-6">

                                    <label class="form-label">
                                        Veículo *
                                    </label>

                                    <select name="srvIdVeiculo" class="form-select" required>

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

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Quilometragem na Saída *
                                    </label>

                                    <input type="number" name="srvKmHorasSaida" class="form-control" required>
                                </div>



                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Destino

                                    </label>

                                    <input type="text" name="srvDestino" class="form-control" required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Data da Saída

                                    </label>

                                    <input type="date" name="srvDataSaida" class="form-control"
                                        value="<?= date('Y-m-d') ?>">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Motivo da Saída

                                </label>

                                <textarea name="srvMotivo" class="form-control" rows="3"></textarea>

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