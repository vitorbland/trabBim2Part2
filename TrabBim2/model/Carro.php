<?php
class Carro{
    private $placa;
    private $modelo;
    private $cor;
    private $ano;
    private $valor;
    
    public function getPlaca(){
        return $this->placa;
    }

    public function setPlaca($placa){
        $this->placa = $placa;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function __toString(){
        return "Carro: Placa: {$this->placa} - Modelo: {$this->modelo} - Cor: {$this->cor} - Ano: {$this->ano} - Valor: {$this->valor}";
    }
}
?>