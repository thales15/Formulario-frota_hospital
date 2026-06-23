<?php 

require_once './conection.php';

//echo var_dump($_POST);

$table = 'tblveiculo';
 $placeholders = [];
 $fields = [];

if(isset($_POST['veiTipoGeral']) && isset($_POST['veiIdentificacaoPrincipal']) && isset($_POST['veiStatus'])){
    foreach ($_POST as $key => $value) {
    $fields[] = $key;
    $placeholders[] = ':' . $key;
}
$sql = "INSERT INTO " . $table. " (" . implode(", ", $fields) . ") VALUES (" . implode(", ", $placeholders) . ")";
$stmt = $con->prepare($sql);
foreach ($_POST as $key => $value) {
    $stmt->bindValue(':' . $key, $value);
}
if($stmt->execute()){
    $idVeiculo = $con->lastInsertId();
   if($_POST['veiTipoGeral'] == "Terrestre"){
    header('Location: ./tiposVeiculos/form_terrestre.php?idVeiculo=' . $idVeiculo);
   }else if($_POST['veiTipoGeral'] == "Aereo"){
    header('Location: ./tiposVeiculos/form_aereo.php?idVeiculo=' . $idVeiculo);
   }else{
    echo "Tipo de veículo inválido.";
    exit;
   }
}else{
    header('Location: index.php?signFail=true');
    exit;
}
}else{
    header('Location: index.php?null=true');
    exit;
}

?>