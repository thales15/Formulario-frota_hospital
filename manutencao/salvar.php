<?php
require_once '../conection.php';
// echo var_dump($_POST);

$table = 'tblmanutencao_veiculo';
$placeholders = [];
$fields = [];

if (isset($_POST['manIdVeiculo']) && isset($_POST['manTipoManutencao']) && isset($_POST['manDataManutencao']) && isset($_POST['manKmHorasManutencao']) && isset($_POST['manValor']) && isset($_POST['manOficina']) && isset($_POST['manDescricao'])) {

    $_POST['manValor'] = str_replace(',', '.', $_POST['manValor']);

    foreach ($_POST as $key => $value) {
        $fields[] = $key;
        $placeholders[] = ':' . $key;
    }
    $sql = "INSERT INTO " . $table . " (" . implode(", ", $fields) . ") VALUES (" . implode(", ", $placeholders) . ")";
    $stmt = $con->prepare($sql);
    foreach ($_POST as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
    }
    if ($stmt->execute()) {
        $idVeiculo = $_POST['manIdVeiculo'];
        $sqlUpdate = "UPDATE tblveiculo SET veiStatus = 'Manutencao' WHERE idVeiculo = :idVeiculo";
        $stmtUpdate = $con->prepare($sqlUpdate);
        $stmtUpdate->bindValue(':idVeiculo', $idVeiculo);
        if($stmtUpdate->execute()){
            header('Location: ./lista.php?signSucess=true');
        } else {
            header('Location: form.php?updateFail=true');
            exit;
        }

    } else {
        header('Location: form.php?signFail=true');
        exit;
    }
} else {
    header('Location: form.php?null=true');
    exit;
}


?>