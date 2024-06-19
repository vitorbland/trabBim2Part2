<?php
class CarroDao{

    public function inserir(Carro $carro){
        try{
            $sql = "INSERT INTO carro(placa, modelo, cor, ano, valor) VALUES (:placa, :modelo, :cor, :ano, :valor);";
            $con_sql = ConnectionFactory::getConnection()->prepare($sql);
            $con_sql->bindValue(":placa", $carro->getPlaca());
            $con_sql->bindValue(":modelo", $carro->getModelo());
            $con_sql->bindValue(":cor", $carro->getCor());
            $con_sql->bindValue(":ano", $carro->getAno());
            $con_sql->bindValue(":valor", $carro->getValor());

            return $con_sql->execute();
        }catch(PDOException $e){
            print "<p>Erro ao inserir Carro </p> <p> $e </p>";
        }
    }
    public function read(){
        try{
            $sql = "SELECT * FROM carro";
            $result = ConnectionFactory::getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $carro_lista = array();
            foreach($lista as $l){
                $carro_lista[] = $this->listaCarro($l);
            }
            return $carro_lista;
        }catch(PDOException $e){
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
        
    }

    public function listaCarro($row){
        $carro = new carro;
        $carro->setPlaca($row['placa']);
        $carro->setModelo($row['modelo']);
        $carro->setCor($row['cor']);
        $carro->setAno($row['ano']);
        $carro->setValor($row['valor']);
        return $carro;
    }

    public function delete(carro $carro) {
        try{
            $sql = "DELETE FROM carro WHERE placa = :placa";
            $con_sql = ConnectionFactory::getConnection()->prepare($sql);
            $con_sql->bindValue(":placa", $carro->getPlaca());
            return $con_sql->execute();
        }catch(PDOException $e){
            echo "Erro ao Excluir Carro<br> $e <br>";
        }
    }
}
?>