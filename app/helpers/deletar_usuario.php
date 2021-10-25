<?php
require '../class/Banco.php';
require '../config.php';

$id = $_GET['id'];

$conexao = new Banco($banco);
$itens = $conexao->delete($id);

header("Location: http://localhost/PHP/CRUD%20POO/public/index.php");
exit();
