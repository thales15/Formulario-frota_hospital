<?php 

require_once '../conection.php';

//echo var_dump($_POST);

$table = 'tblMotorista';
 $placeholders = [];
 $fields = [];

if(isset($_POST['motIdFuncionario']) && isset($_POST['motCnhNumero']) && isset($_POST['motStatus'])){
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
   header('Location: lista.php?signSuccess=true');
}else{
    header('Location: index.php?signFail=true');
    exit;
}
}else{
    header('Location: index.php?null=true');
    exit;
}

?>