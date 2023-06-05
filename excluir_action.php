<?php
require 'conexao.php';
require 'DAO/UsuarioDaoMySql.php';

$usuarioDAO = new UsuarioDaoMySql($pdo);

$usuario_id = filter_input(INPUT_GET, 'id');

if ($usuario_id) {
    $usuarioDAO->delete($usuario_id);
}

header('Location: index.php');
exit;
