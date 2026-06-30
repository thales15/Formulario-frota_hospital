<?php

require "../conection.php";
// echo var_Dump($_POST);

$sql = "UPDATE tblsaida_retorno_veiculo SET srvDataRetorno = :srvDataRetorno, srvKmHorasRetorno = :srvKmHorasRetorno WHERE idMovimentacao  = :idMovimentacao";
$stmt = $con->prepare($sql);
$stmt->bindValue(':srvDataRetorno', $_POST['srvDataRetorno']);
$stmt->bindValue(':srvKmHorasRetorno', $_POST['srvKmHorasRetorno']);
$stmt->bindValue(':idMovimentacao', $_POST['idMovimentacao']);
if($stmt->execute()){
    $idMovimentacao = $_POST['idMovimentacao'];
    $sqlVeiculo = "SELECT srvIdVeiculo FROM tblsaida_retorno_veiculo WHERE idMovimentacao = :idMovimentacao";
    $stmtVeiculo = $con->prepare($sqlVeiculo);
    $stmtVeiculo->bindValue(':idMovimentacao', $idMovimentacao);
    $stmtVeiculo->execute();
    $veiculo = $stmtVeiculo->fetch(PDO::FETCH_ASSOC);
    if ($veiculo) {
        $idVeiculo = $veiculo['srvIdVeiculo'];
        $sqlUpdate = "UPDATE tblveiculo SET veiStatus = 'Disponivel' WHERE idVeiculo = :idVeiculo";
        $stmtUpdate = $con->prepare($sqlUpdate);
        $stmtUpdate->bindValue(':idVeiculo', $idVeiculo);
        if($stmtUpdate->execute()){
            header('Location: ./lista.php?returnSucess=true');
        } else {
            header('Location: form_retorno.php?updateFail=true');
            exit;
        }
    } else {
        header('Location: form_retorno.php?vehicleNotFound=true');
        exit;
    }
} else {
    header('Location: form_retorno.php?signFail=true');
    exit;
}
?>