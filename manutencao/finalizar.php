<?php 

require "../conection.php";

if(isset($_GET['id']) && isset($_GET['manId'])) {
    $sql = "UPDATE tblmanutencao_veiculo SET manStatus = 'Finalizada' WHERE idManutencao = :manId";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':manId', $_GET['manId']);
    if($stmt->execute()) {
        $updateVeiculoSql = "UPDATE tblveiculo SET veiStatus = 'Disponivel' WHERE idVeiculo = :id";
        $updateVeiculoStmt = $con->prepare($updateVeiculoSql);
        $updateVeiculoStmt->bindParam(':id', $_GET['id']);
        if($updateVeiculoStmt->execute()) {
            header('Location: lista.php?ManCompleted=true');
            exit();
        } else {
            echo "Erro ao atualizar o status do veículo.";
        }
    } else {
        echo "Erro ao finalizar a manutenção.";
    }
} else {
    header('Location: lista.php');
}

?>