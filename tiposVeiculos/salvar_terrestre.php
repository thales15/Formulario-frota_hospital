<?php 
require_once '../conection.php';
// echo var_dump($_POST);

 $table = 'tblveiculoterrestre';
 $placeholders = [];
 $fields = [];

if(isset($_POST['vetIdVeiculo']) && isset($_POST['vetRenavam']) && isset($_POST['vetChassi'])  && isset($_POST['vetCombustivel'])  && isset($_POST['vetTipoVeiculo'])  && isset($_POST['vetPossuiMaca'])  && isset($_POST['vetPossuiOxigenio'])  && isset($_POST['vetPossuiDesfibrilador'])){

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
}else{
    header('Location: form.php?signFail=true');
    exit;
}
}else{
    header('Location: index.php?null=true');
    exit;
}


?>