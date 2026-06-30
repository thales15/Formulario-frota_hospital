<?php
require_once '../conection.php';
// echo var_dump($_POST);

$table = 'tblsaida_retorno_veiculo';
$placeholders = [];
$fields = [];

if (isset($_POST['srvIdMotorista']) && isset($_POST['srvIdVeiculo']) && isset($_POST['srvDataSaida']) && isset($_POST['srvKmHorasSaida']) && isset($_POST['srvDestino']) && isset($_POST['srvMotivo'])) {

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
        $idVeiculo = $_POST['srvIdVeiculo'];
        $sqlUpdate = "UPDATE tblveiculo SET veiStatus = 'Utilizando' WHERE idVeiculo = :idVeiculo";
        $stmtUpdate = $con->prepare($sqlUpdate);
        $stmtUpdate->bindValue(':idVeiculo', $idVeiculo);
        if($stmtUpdate->execute()){
            header('Location: ./lista.php?exitSucess=true');
        } else {
            header('Location: form_retirada.php?updateFail=true');
            exit;
        }

    } else {
        header('Location: form_retirada.php?signFail=true');
        exit;
    }
} else {
    header('Location: form_retirada.php?null=true');
    exit;
}


?>