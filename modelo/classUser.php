<?php

    require_once "classConexion.php";

    class User{ 

        public function userExists($correo, $pass){
            $db = new Conexion();
            $dbh = $db->getConexion();
            //$hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
            $sql = "SELECT * FROM clientes WHERE Correo = :email AND Contra = :pass";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email',$correo);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            
            if($stmt->rowCount()){
                return true;
            }else{
                return false;
            }   
        }

        public function cerrarSesion(){
            session_start();
            session_unset();
            session_destroy();
        }

        public function perfil($correo){
            $cn = new Conexion();
            $dbh = $cn->getConexion();

            $sql = "SELECT * FROM clientes WHERE Correo=:Correo";
            
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':Correo', $correo);
                $stmt->execute();

            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $datos;
        }

    }

?>