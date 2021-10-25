<?php
class Usuario {
    private $id;
    private $nome;
    private $idade;
    private $email;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }
}