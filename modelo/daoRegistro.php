<?php
    require_once "classConexion.php";

    class Registro{

        public function Insertar($DUI, $nombres, $apellidos, $fechaNac, $telefono, $correo, $contra, $depart, $sueldo){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "INSERT INTO clientes(DUI, Nombres, Apellidos, FechaNac, Telefono, Correo, Contra, Departamento, Sueldo) VALUES (:DUI, :nombres, :apellidos, :fechanac, :telefono, :correo, :contra, :departamento, :sueldo)";
    
            $stmt = $dbh->prepare($sql);
            
            $stmt->bindParam(':DUI',$DUI);
            $stmt->bindParam(':nombres', $nombres);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':fechanac', $fechaNac);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contra',$contra);
            $stmt->bindParam(':departamento', $depart);
            $stmt->bindParam(':sueldo', $sueldo);
            
            $stmt->execute();

            
        }

        public function verifyDui($dui){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "SELECT * FROM clientes WHERE DUI = :dui";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':dui', $dui);
            $stmt->execute();

            if($stmt->rowCount()){
                return true;
            } else {
                return false;
            }
        }

        public function verifyCorreo($correo){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "SELECT * FROM clientes WHERE Correo = :correo";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();

            if($stmt->rowCount()){
                return true;
            } else {
                return false;
            }
        }
    }
?>