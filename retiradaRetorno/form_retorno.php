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
                        retornos pendentes
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Veículo</th>
                                    <th>Motorista</th>
                                    <th>data Saída</th>
                                    <th>Km saída</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php
                                $sql = "SELECT
    v.veiIdentificacaoPrincipal,
    f.funNome,
    r.idMovimentacao,
    r.srvDataSaida,
    r.srvKmHorasSaida
FROM tblsaida_retorno_veiculo r
INNER JOIN tblveiculo v
    ON r.srvIdVeiculo = v.idVeiculo
INNER JOIN tblmotorista m
    ON r.srvIdMotorista = m.idMotorista
INNER JOIN tblfuncionario f
    ON m.motIdFuncionario = f.idFuncionario
WHERE r.srvDataRetorno IS NULL
ORDER BY r.idMovimentacao ASC";

                                $retornos = $con->prepare($sql);
                                $retornos->execute();

                                foreach ($retornos as $v): ?>

                                    <tr>

                                        <td><?= $v['idMovimentacao'] ?></td>

                                        <td><?= $v['veiIdentificacaoPrincipal'] ?></td>

                                        <td><?= $v['funNome'] ?></td>

                                        <td><?= $v['srvDataSaida'] ?></td>

                                        <td><?= $v['srvKmHorasSaida'] ?></td>

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
                        Registro do retorno
                    </div>

                    <div class="card-body">

                        <form action="salvar_retorno.php" method="POST">

                            <div class="mb-3">

                                <label class="form-label">Saída pendente</label>
                                <select name="idMovimentacao" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <?php
                                    $sql = "SELECT idMovimentacao FROM tblsaida_retorno_veiculo WHERE srvDataRetorno IS NULL";
                                    $saidas = $con->prepare($sql);
                                    $saidas->execute();
                                    foreach ($saidas as $opcao): ?>
                                        <option value="<?= $opcao['idMovimentacao'] ?>">
                                            <?= $opcao['idMovimentacao'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Data retorno *
                                </label>

                                <input type="date" name="srvDataRetorno" class="form-control" required>

                            </div>

                            <div class=" mb-3">
                                <label class="form-label">
                                    Quilometragem no Retorno *
                                </label>

                                <input type="number" name="srvKmHorasRetorno" class="form-control" required>
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