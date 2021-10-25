<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <?php
    require '../app/config.php';
    require '../app/class/Banco.php';

    $conexao = new Banco($banco);
    $id = $_GET['id'];
    $informacoes = $conexao->read($id);

    ?>
    <div class="crud">
        <a class="back" href="index.php"><i class="fad fa-arrow-alt-left"></i></a>
        <h1>C.R.U.D edição</h1>
        
        <form action="../app/helpers/editar_conta.php" method="POST">
            <input type="hidden" name="id" value="<?= $informacoes->getId(); ?>">
            <label>Nome</label>
            <input class="inp" type="text" name="nome" value="<?= $informacoes->getNome(); ?>">
            <label>Idade</label>
            <input class="inp" type="text" name="idade" value="<?= $informacoes->getIdade(); ?>">
            <label>Email</label>
            <input class="inp" type="text" name="email" value="<?= $informacoes->getEmail(); ?>">
            <input class="envia" type="submit" value="ENVIAR">
        </form>
    </div>
</body>
</html>