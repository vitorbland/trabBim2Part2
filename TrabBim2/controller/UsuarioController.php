<?php
include "../dao/ConnectionFactory.php";
include "../dao/UsuarioDao.php";
include "../model/Usuario.php";

$usuario = new Usuario();
$usuarioDao = new UsuarioDao();


$dadosRequest = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){
    $usuario->setDocumento($_POST['documento']);
    $usuario->setNome($_POST['nome']);
    $usuario->setEndereco($_POST['endereco']);
    $usuarioDao->inserir($usuario);
    header("Location: ../view/usuario.php");
}
else if(isset($_GET['del'])){
    $usuario->setDocumento($_GET['del']);
    $usuarioDao->delete($usuario);
    header("Location: ../view/usuario.php");
}
?>