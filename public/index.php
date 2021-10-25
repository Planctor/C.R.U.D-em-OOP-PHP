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
    $itens = $conexao->lista();

    ?>
    <div class="crud">
        <h1>C.R.U.D</h1>
        <div class="container">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>email</th>
                    <th>Açoes</th>
                </tr>

                <?php foreach($itens as $l):  ?>
                <tr>
                    <td><?= $l->getId(); ?></td>
                    <td><?= $l->getNome(); ?></td>
                    <td><?= $l->getIdade(); ?></td>
                    <td><?= $l->getEmail(); ?></td>
                    <td>
                        <a href="editar.php?id=<?= $l->getId(); ?>"><i class="fas fa-cog"></i></a>
                        <a href="../app/helpers/deletar_usuario.php?id=<?= $l->getId(); ?>"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endforeach;  ?>
            </table>
        </div>
        
        <a class="envia" href="criar.php">CRIAR</a>
    </div>
</body>
</html>