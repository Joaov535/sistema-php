<?php
require 'conexao.php';
require 'DAO/UsuarioDaoMySql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuario = $usuarioDao->findById($id);
}
if ($usuario === false) {
    header('Location: index.php');
}
?>

<h1>Editar usuários</h1>

<a href="index.php">Voltar</a>

<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">
    <label for="nome">
        Nome:<br />
        <input type="text" name="nome" id="nome_input" value="<?= $usuario->getName(); ?>">
    </label><br /><br />
    <label for="email">
        E-mail: <br />
        <input type="email" name="email" id="input_email" value="<?= $usuario->getEmail(); ?>">
    </label><br /><br />
    <input type="submit" value="Salvar">
</form>