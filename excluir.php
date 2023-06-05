<?php
require 'conexao.php';
require 'DAO/UsuarioDaoMySql.php';

$usuarioDAO = new UsuarioDaoMySql($pdo);


$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuario = $usuarioDAO->findById($id);
} else {
    header('Location: index.php');
    exit;
}
?>

<h1>Deseja excluir o usuário <?= $usuario->getName() ?>?</h1>
<br>
<a href="excluir_action.php?id=<?= $usuario->getId(); ?>"><button>Excluir</button></a>
<a href="index.php"><button>Cancelar</button></a>