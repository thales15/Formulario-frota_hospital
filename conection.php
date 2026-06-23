<?php 

$server = "localhost";
$user = "root";
$porta = 3307; //Na aula do Hélio utilizar a porta 3307
//$banco = "banco_hospital"; //banco padrão
$banco = "hospital"; // banco no computador do Hélio
$base_url = "http://localhost/cadastrofrotaHospital";

if (!defined('BASE_URL')) define('BASE_URL', $base_url);

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR);
}

try{
    $con = new PDO("mysql:host=$server;port=$porta;dbname=$banco", $user, "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>