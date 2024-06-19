<?php
class FabricanteDao{

    public function inserir(Fabricante $fabricante){
        try{
            $sql = "INSERT INTO fabricante(nome, endereco, documento) VALUES (:nome, :endereco, :documento);";
            $con_sql = ConnectionFactory::getConnection()->prepare($sql);
            $con_sql->bindValue(":nome", $fabricante->getNome());
            $con_sql->bindValue(":endereco", $fabricante->getEndereco());
            $con_sql->bindValue(":documento", $fabricante->getDocumento());
            
            return $con_sql->execute();
        }catch(PDOException $e){
            print "<p>Erro ao inserir Fabricante </p> <p> $e </p>";
        }
    }

    public function read(){
        try{
            $sql = "SELECT * FROM fabricante";
            $result = ConnectionFactory::getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $fabricante_lista = array();
            foreach($lista as $l){
                $fabricante_lista[] = $this->listaFabricantes($l);
            }
            return $fabricante_lista;
        }catch(PDOException $e){
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
        
    }

    public function listaFabricantes($row){
        $fabricante = new fabricante();
        $fabricante->setDocumento($row['documento']);
        $fabricante->setNome($row['nome']);
        $fabricante->setEndereco($row['endereco']);
        return $fabricante;
    }

    public function delete(fabricante $fabricante) {
        try{
            $sql = "DELETE FROM fabricante WHERE documento = :documento";
            $con_sql = ConnectionFactory::getConnection()->prepare($sql);
            $con_sql->bindValue(":documento", $fabricante->getDocumento());
            return $con_sql->execute();
        }catch(PDOException $e){
            echo "Erro ao Excluir Fabricante<br> $e <br>";
        }
    }
}
?>