<?php
class ConnectionFactory{
    static $conn;

    public static function getConnection(){
        if(!isset($conn)){
            $database = "TrabBim2";
            $user = "root";
            $pass = "";
            $host = "localhost";
            $port = "3306";
            try{
                $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $pass);
                return $conn;
            }catch(PDOException $ex){
                echo "Erro! ". $ex->getMessage();
                return null;
            }
        }
        return $conn;
    }
}
?>