<?php
require "Usuario.php";

class Banco {
    private $bd;

    public function __construct($banco){
        $this->bd = $banco;
    }

    public function lista() {
        $sql = $this->bd->query('SELECT * FROM `usuarios` ');
        $lista = $sql->fetchAll();

        $dados = [];

        if ( $sql->rowCount() > 0 ) {
            foreach ($lista as $key ) {
                $user = new Usuario();
                $user->setId($key['id']);
                $user->setNome($key['nome']);
                $user->setEmail($key['email']);
                $user->setIdade($key['idade']);

                $dados[] = $user;
            }             
            return $dados;
        } else {
            return false;
        }
             
    }

    public function create($user) {
        $sql = $this->bd->prepare("INSERT INTO `usuarios`(`nome`, `idade`, `email`) VALUES (:nome, :idade, :email)");
        $sql->bindValue(':nome',  $user->getNome());
        $sql->bindValue(':idade',  $user->getIdade());
        $sql->bindValue(':email',  $user->getEmail());
        $sql->execute();
        
        return $sql;
    }

    public function read($id) {
        $sql = $this->bd->prepare("SELECT * FROM `usuarios` WHERE `id` = :id");
        $sql->bindValue(':id',  $id);
        $sql->execute();

        if ($sql) {
            $dado = $sql->fetch();
            $dados_Usuario = new Usuario();
            $dados_Usuario->setId($dado['id']);
            $dados_Usuario->setNome($dado['nome']);
            $dados_Usuario->setIdade($dado['idade']);
            $dados_Usuario->setEmail($dado['email']);

            return $dados_Usuario;
        }
    }

    public function update($att) {
        echo $att->getNome();
        if ($att->getId() > 0) {
            $sql = $this->bd->prepare("UPDATE `usuarios` SET `nome` = :nome,`idade` = :idade,`email` = :email WHERE `id` = :id");
            $sql->bindValue('id', $att->getId());
            $sql->bindValue('nome', $att->getNome());
            $sql->bindValue('idade', $att->getIdade());
            $sql->bindValue('email', $att->getEmail());
            $sql->execute();
        }
    }

    public function delete($user_id) {
        $sql = $this->bd->prepare('DELETE FROM `usuarios` WHERE `id` = :id');
        $sql->bindValue(':id', $user_id);
        $sql->execute();
    }
}