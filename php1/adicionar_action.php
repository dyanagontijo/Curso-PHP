<?php

require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo); //instanciando minha classe UsuarioDaoMysql

$name =filter_input(INPUT_POST, 'name');
$email =filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    if($usuarioDao->findByEmail($email) === false) { //se ele retornar false e porque ele nao achou nenhum email 
        $novoUsuario = new Usuario(); //se nao achou o processo de adicao e este;
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        $usuarioDao->add( $novoUsuario ); 

        header("Location: index.php");
exit;

    } else {
        header("Location: adicionar.php");
        exit;
    }

}else {
    header("Location: adicionar.php");
    exit;
}