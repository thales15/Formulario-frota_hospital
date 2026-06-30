<?php

require '../conection.php';

$sql = "
    SELECT
       v.veiIdentificacaoPrincipal,
       v.idVeiculo,
       m.*
    FROM tblmanutencao_veiculo m
    INNER JOIN tblveiculo v 
        ON m.manIdVeiculo = v.idVeiculo
        WHERE m.manStatus = 'Em Andamento'
    ORDER BY m.idManutencao ASC
";

$stmt = $con->prepare($sql);
$stmt->execute();
$manutencoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <th>Identificação</th>
                            <th>Km/horas</th>
                            <th>Tipo Manutenção</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Oficina</th>
                            <th>Data Manutenção</th>
                            <th>Próxima Manutenção</th>
                            <th>Finalizar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (count($manutencoes) > 0): ?>

                            <?php foreach ($manutencoes as $manutencao): ?>
                                <tr>
                                    <td><?= $manutencao['idManutencao'] ?></td>

                                    <td>
                                        <?= htmlspecialchars($manutencao['veiIdentificacaoPrincipal']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($manutencao['manKmHorasManutencao']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($manutencao['manTipoManutencao']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($manutencao['manDescricao']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($manutencao['manValor']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($manutencao['manOficina']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($manutencao['manDataManutencao']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($manutencao['manProximaManutencao']) ?>
                                    </td>
                                    <td>
                                        <a href="finalizar.php?id=<?= $manutencao['idVeiculo'] ?>&manId=<?= $manutencao['idManutencao'] ?>"
                                            class="btn btn-sm btn-success">
                                            Finalizar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">
                                    Nenhum veículo encontrado.
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