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
                                    <th>Nome</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php
                                $sql = "SELECT * FROM tblFuncionario ORDER BY idFuncionario ASC";

                                $funcionarios = $con->prepare($sql);
                                $funcionarios->execute();

                                foreach ($funcionarios as $f): ?>

                                    <tr>

                                        <td><?= $f['idFuncionario'] ?></td>

                                        <td><?= $f['funNome'] ?></td>

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
                        Cadastro de Motorista
                    </div>

                    <div class="card-body">

                        <form action="salvar.php" method="POST">

                            <div class="mb-3">

                                <label class="form-label">
                                   Funcionario *
                                </label>

                                <select name="motIdFuncionario " class="form-select" required>

                                    <option value="">Selecione</option>

                                    <?php
                                    $sql = "SELECT * FROM tblFuncionario ORDER BY idFuncionario ASC";

                                    $funcionarios = $con->prepare($sql);
                                    $funcionarios->execute();

                                    foreach ($funcionarios as $opcao): ?>

                                        <option value="<?= $opcao['idFuncionario'] ?>">

                                            <?= $opcao['funNome'] ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Número CNH

                                    </label>

                                     <input type="text" name="motCnhNumero" class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Categoria CNH

                                    </label>

                                    <input type="text" name="motCnhCategoria" class="form-control">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Validade CNH

                                </label>

                               <input type="date" name="motCnhValidade" class="form-control">

                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Númeor do Brevete

                                    </label>

                                    <input type="text" name="motBreveteNumero" class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Validade do Brevete

                                    </label>

                                    <input type="date" name="motBreveteValidade" class="form-control">

                                </div>

                            </div>

                             <div class=" mb-3">

                                    <label class="form-label">

                                       Observação

                                    </label>

                                   <Textarea name="observacoes" class="form-control"></textarea>

                                </div>


                            <input type="hidden" name="motStatus" value="Ativo">

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