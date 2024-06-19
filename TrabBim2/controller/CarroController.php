<?php
include "../dao/ConnectionFactory.php";
include "../dao/CarroDao.php";
include "../model/Carro.php";

$carro = new Carro();
$carroDao = new CarroDao();


$dadosRequest = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){
    $carro->setPlaca($_POST['placa']);
    $carro->setModelo($_POST['modelo']);
    $carro->setCor($_POST['cor']);
    $carro->setAno($_POST['ano']);
    $carroDao->inserir($carro);
    header("location: ../view/carro.php");
}
else if(isset($_GET['del'])){
    $carro->setPlaca($_GET['del']);
    $carroDao->delete($carro);
    header("location: ../view/carro.php");
}
?>