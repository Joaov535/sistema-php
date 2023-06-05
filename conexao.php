<?php 

$db_name = 'test';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host ,$db_user);

// $sql = $pdo->query("SELECT * FROM usuarios");

// $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

// print_r($dados);

?>