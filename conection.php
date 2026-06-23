<?php 

$server = "localhost";
$user = "root";
$banco = "banco_hospital";
$base_url = "http://localhost/cadastrofrota-hospital/";
try{
    $con = new PDO("mysql:host=$server;dbname=$banco", $user, "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>