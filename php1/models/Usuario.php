<?php
class Usuario{
private $id;
private $nome;
private $email;

public function getId(){
    return $this->id;
    }
public function setId($i){
    $this->id = trim ($i); //trim para nao aceitar espacos 

}
public function getNome(){
    return $this->nome;
    }
public function setNome($n){
    $this->nome= ucwords(trim($n)); //trim para nao aceitar espacos 
    
}
public function getEmail(){
    return $this->email;
    }
public function setemail($e){
    $this->id = strtolower(trim ($e)) ; //trim para nao aceitar espacos 
    }
}
// Criacao da segunda classe que faz a intermediacao com o banco de dados atraves de um banco de dados 

interface UsuarioDAO { //criando o CRUD
    public function add(Usuario $u); //recebendo um objeto da classe
    public function findAll(); //retornara uma lista com varios objetos da classe usuario
    public function findByEmail($email); 
    public function findById($id);
    public function update(Usuario $u);
    public function deletet ($id);
}
