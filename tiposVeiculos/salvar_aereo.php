<?php 
require_once '../conection.php';
 //echo var_dump($_POST);

 $table = 'tblveiculoaereo';
 $placeholders = [];
 $fields = [];

if(isset($_POST['veaIdVeiculo']) && isset($_POST['veaMatriculaAnac']) && isset($_POST['veaPrefixoRadio'])  && isset($_POST['veaAutonomiaVoo'])  && isset($_POST['veacapacidadePessoas'])  && isset($_POST['veaPossuiKitMedico'])  && isset($_POST['veaPossuiMaca'])  && isset($_POST['veaPossuiOxigenio'])){

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
   header('Location: ./lista_aereo.php?signSucess=true'); 
}else{
    header('Location: form_aereo.php?idVeiculo='. $_POST['veaIdVeiculo'] .'&signFail=true');
    exit;
}
}else{
    header('Location: form_aereo.php?idVeiculo='. $_POST['veaIdVeiculo'] .'&idnull=true');
    exit;
}


?>