<?php
require_once ("classConexion.php");
class DaoCuentaBanco{ 
    public function insertarCuenta($cuenta){
        $cn = new Conexioon(); //Instanciando el objeto Conexión      
        $dbh = $cn->getConexion(); //Llamando el metodo conexión
        $sql = "INSERT INTO cuentaahorro (NumCuenta, Dui, Titular, Estado) VALUES (:numCuenta, :dui, :titular, :estado)"; //Consulta SQL
        try{
            $stmt = $dbh->prepare($sql);
            if($stmt->execute((array)$cuenta)){ //Creando el objeto cuenta a un array
                ?>
                <script>
                  alert('La cuenta se ha creado sastifactoriamente');
                  window. history. back(-1);
                  
                </script>
              <?php
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 

    public function mostrarCuentas($dui){
        $sql = "SELECT * FROM cuentaahorro WHERE Dui =:dui and Estado = 'Activo'";
        $cn = new Conexioon();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':dui',$dui);
        $stmt->execute();
        $cuenta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cuenta;
    }

    public function eliminarCuenta($numCuenta, $estado){
        $sql = "UPDATE cuentaahorro SET Estado=:estado WHERE numCuenta =:cuenta";
        $cn = new Conexioon();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':cuenta',$numCuenta);
        $stmt->bindParam(':estado',$estado);
        if($stmt->execute()){
            ?>
            <script>
                alert("La cuenta se ha eliminado.");
                window.location.href = "../../vista/login/perfil.php";
            </script>
          <?php
        }
        $cuenta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cuenta;
    }

    public function mostrarMiCuenta($numCuenta){
        $sql = "SELECT * FROM cuentaahorro WHERE NumCuenta =:cuenta and Estado = 'Activo'";
        $cn = new Conexioon();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':cuenta',$numCuenta);
        $stmt->execute();
        $monto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $monto;
    }

    public function mostrarTodo(){
        $sql = "SELECT * FROM cuentaahorro WHERE Estado = 'Activo'";
        $cn = new Conexioon();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $monto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $monto;
    }
    
    public function CantDui($dui){
        $sql = "SELECT COUNT(*) FROM cuentaahorro WHERE Dui=:dui and Estado = 'Activo'";
        $cn = new Conexioon();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':dui',$dui);
        $stmt->execute();
        $dui = $stmt->fetch();
        return $dui;
    }
}
?>