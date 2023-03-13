<?php
    class Conexioon{
        public function getConexion(){ 
            $host = "localhost";
            $bdd = "agro_binance";
            $user = "AgroBinance";
            $pass = "AgroBinance23";
            try{
                $dsn = "mysql:host=$host;dbname=$bdd";
                $dbh = new PDO($dsn,$user,$pass);
                return $dbh;
            }catch(PDOException  $e){
                echo "Fallo de conexión: " . $e->getMessage();
            }
        }
    }
?>