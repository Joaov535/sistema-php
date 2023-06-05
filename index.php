<?php

require 'conexao.php';
require 'DAO/UsuarioDaoMySql.php';

$usuarioDAO = new UsuarioDaoMySql($pdo);
$lista = $usuarioDAO->findAll();
?>

<a href="adicionar.php">adicionar usuários</a><br /><br />

<table border="1" width="100%">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>E-mail</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $usuarios) : ?>
            <tr>
                <td><?= $usuarios->getId(); ?></td>
                <td><?= $usuarios->getName(); ?></td>
                <td><?= $usuarios->getEmail(); ?></td>
                <td>
                    [<a href="editar.php?id=<?= $usuarios->getId(); ?> ">Editar</a>]|
                    [<a href="excluir.php?id=<?= $usuarios->getId(); ?>">Excluir</a>]
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>