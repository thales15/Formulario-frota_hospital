<?php
require_once '../conection.php';

$sql = "
    SELECT
       v.*,
       vt.*
    FROM tblveiculo v
    INNER JOIN tblveiculoterrestre vt
        ON vt.vetIdVeiculo = v.idVeiculo
    ORDER BY v.idVeiculo ASC
";

$stmt = $con->prepare($sql);
$stmt->execute();
$veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículos Terrestres</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "../_inc/header.php"; ?>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Veículos Terrestres</h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Identificação</th>
                            <th>Km Atual</th>
                            <th>Combustível</th>
                            <th>Tipo</th>
                            <th>Nível</th>
                            <th>Maca</th>
                            <th>Oxigênio</th>
                            <th>Desfibrilador</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(count($veiculos) > 0): ?>

                            <?php foreach($veiculos as $veiculo): ?>
                                <tr>
                                    <td><?= $veiculo['idVeiculo'] ?></td>

                                    <td>
                                        <?= htmlspecialchars($veiculo['veiIdentificacaoPrincipal']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($veiculo['veiKmHorasAtual']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($veiculo['vetCombustivel']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($veiculo['vetTipoVeiculo']) ?>
                                    </td>

                                     <td>
                                        <?= htmlspecialchars($veiculo['vetNivelAmbulancia']) ?>
                                    </td>

                                   <td class="text-center">
                                        <?php if($veiculo['vetPossuiMaca'] == 'Sim'): ?>
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        <?php elseif($veiculo['vetPossuiMaca'] == 'Nao'):?>
                                            <i class="bi bi-x-circle-fill text-danger"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($veiculo['vetPossuiOxigenio'] == 'Sim'): ?>
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        <?php elseif($veiculo['vetPossuiOxigenio'] == 'Nao'):?>
                                            <i class="bi bi-x-circle-fill text-danger"></i>
                                        <?php endif; ?>
                                    </td>
                                   <td class="text-center">
                                        <?php if($veiculo['vetPossuiDesfibrilador'] == 'Sim'): ?>
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        <?php elseif($veiculo['vetPossuiDesfibrilador'] == 'Nao'):?>
                                            <i class="bi bi-x-circle-fill text-danger"></i>
                                        <?php endif; ?>
                                    </td>
                                    

                                   

                                    <td>
                                        <?php if($veiculo['veiStatus'] == 'Disponivel'): ?>
                                            <span class="badge bg-success">
                                               Disponível
                                            </span>
                                        <?php elseif($veiculo['veiStatus'] == 'Manutencao'): ?>
                                            <span class="badge bg-warning">
                                                Manutenção
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">
                                               Utilizando
                                            </span>
                                        <?php endif; ?>
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

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>