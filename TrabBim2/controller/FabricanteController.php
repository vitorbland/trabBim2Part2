<?php
include "../dao/ConnectionFactory.php";
include "../dao/FabricanteDao.php";
include "../model/Fabricante.php";

$fabricante = new Fabricante();
$fabricanteDao = new FabricanteDao();


$dadosRequest = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){
    $fabricante->setDocumento($_POST['documento']);
    $fabricante->setNome($_POST['nome']);
    $fabricante->setEndereco($_POST['endereco']);
    $fabricanteDao->inserir($fabricante);
    header("location: ../view/fabricante.php");
}
else if(isset($_GET['del'])){
    $fabricante->setDocumento($_GET['del']);
    $fabricanteDao->delete($fabricante);
    header("location: ../view/fabricante.php");
}
?>