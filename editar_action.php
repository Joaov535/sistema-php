<?php

require 'conexao.php';
require 'DAO/UsuarioDaoMySql.php';

$usuarioDAO = new UsuarioDaoMySql($pdo);

$usuario_id = filter_input(INPUT_POST, 'id');
$usuario_nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$usuario_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

if ($usuario_id && $usuario_nome && $usuario_email) {
    $usuario = new Usuario();
    $usuario->setId($usuario_id); 
    $usuario->setName($usuario_nome);
    $usuario->setEmail($usuario_email);

    $usuarioDAO->update($usuario);

    header('Location: index.php');
    exit;
} else {
    header('Location: editar.php?id='.$usuario_id);
    exit;
}
