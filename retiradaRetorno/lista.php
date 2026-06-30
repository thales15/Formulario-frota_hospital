<?php

require '../conection.php';

$sql = "
    SELECT
       v.veiIdentificacaoPrincipal,
       f.funNome,
       r.*
    FROM tblsaida_retorno_veiculo r
    INNER JOIN tblveiculo v 
        ON r.srvIdVeiculo = v.idVeiculo
    INNER JOIN tblmotorista m
        ON r.srvIdMotorista = m.idMotorista
    INNER JOIN tblFuncionario f
        ON m.motIdFuncionario = f.idFuncionario
    ORDER BY r.idMovimentacao ASC
";

$stmt = $con->prepare($sql);
$stmt->execute();
$retiradas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include '../_inc/header.php'; ?>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Manutenções</h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Veículo</th>
                            <th>Motorista</th>
                            <th>Data Saída</th>
                            <th>Km/Horas saída</th>
                            <th>Destino</th>
                            <th>Motivo</th>
                            <th>Data Retorno</th>
                            <th>Km/Horas retorno</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (count($retiradas) > 0): ?>

                            <?php foreach ($retiradas as $retirada): ?>
                                <tr>
                                    <td><?= $retirada['idMovimentacao'] ?></td>

                                    <td>
                                        <?= htmlspecialchars($retirada['veiIdentificacaoPrincipal']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($retirada['funNome']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($retirada['srvDataSaida']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($retirada['srvKmHorasSaida']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($retirada['srvDestino']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($retirada['srvMotivo']) ?>
                                    </td>
                                    <td>
                                        <?php if ($retirada['srvDataRetorno']): ?>
                                            <?= htmlspecialchars($retirada['srvDataRetorno']) ?>
                                        <?php else: ?>
                                            <span class="text-muted">Não finalizada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($retirada['srvKmHorasRetorno']): ?>
                                            <?= htmlspecialchars($retirada['srvKmHorasRetorno']) ?>
                                        <?php else: ?>
                                            <span class="text-muted">Não finalizada</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">
                                    Nenhuma retirada encontrada.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</body>

</html>