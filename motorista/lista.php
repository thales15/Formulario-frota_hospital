<?php
require_once '../conection.php';

$sql = "
    SELECT
       f.funNome,
       m.*
    FROM tblMotorista m
    INNER JOIN tblFuncionario f
        ON f.idFuncionario = m.motIdFuncionario
    ORDER BY m.IdMotorista ASC
";

$stmt = $con->prepare($sql);
$stmt->execute();
$motoristas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Motoristas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "../_inc/header.php"; ?>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Lista de Motoristas</h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CNH número</th>
                            <th>CNH categoria</th>
                            <th>CNH validade</th>
                            <th>Brevete número</th>
                            <th>Brevete validade</th>
                            <th>Observações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(count($motoristas) > 0): ?>

                            <?php foreach($motoristas as $motorista): ?>
                                <tr>
                                    <td><?= $motorista['IdMotorista'] ?></td>

                                    <td>
                                        <?= htmlspecialchars($motorista['funNome']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($motorista['motCnhNumero']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($motorista['motCnhCategoria']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($motorista['motCnhValidade']) ?>
                                    </td>

                                     <td>
                                        <?= htmlspecialchars($motorista['motBreveteNumero']) ?>
                                    </td>

                                   <td>
                                       <?= htmlspecialchars($motorista['motBreveteValidade']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($motorista['observacoes']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">
                                    Nenhum motorista encontrado.
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