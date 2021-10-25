<?php
require '../class/Banco.php';
require '../config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$email = $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$conexao = new Banco($banco);

if ($id) {
    $usuario_att = new Usuario();
    $usuario_att->setId($id);
    $usuario_att->setNome($nome);
    $usuario_att->setIdade($idade);
    $usuario_att->setEmail($email);

    $conexao->update($usuario_att);
    header("Location: http://localhost/PHP/CRUD%20POO/public/index.php");
    exit();

} else {
    header("Location: http://localhost/PHP/CRUD%20POO/public/editar.php");
    exit();
}
