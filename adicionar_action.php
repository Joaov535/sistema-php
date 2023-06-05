<?php

require 'conexao.php';
require 'DAO/UsuarioDaoMySql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$usuario_nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$usuario_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

if ($usuario_nome && $usuario_email) {

    if ($usuarioDao->findByEmail($usuario_email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setName($usuario_nome);
        $novoUsuario->setEmail($usuario_email);

        $usuarioDao->add($novoUsuario);

        header('Location: index.php');
        exit;
    } else {
        header('Location: adicionar.php');
        exit;
    } 
}
