<?php
require '../class/Banco.php';
require '../config.php';

$conexao = new Banco($banco);

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);



if ($email != false) {
    $new_user = new Usuario();
    $new_user->setNome($nome);
    $new_user->setIdade($idade);
    $new_user->setEmail($email);

    $conexao->create($new_user);

    header("Location: http://localhost/PHP/CRUD%20POO/public/index.php");
    exit();
} else {
    header("Location: http://localhost/PHP/CRUD%20POO/public/criar.php");
    exit();
}