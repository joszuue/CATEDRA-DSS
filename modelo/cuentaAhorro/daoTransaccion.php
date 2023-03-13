<?php
    
    class DaoTransaccion{
        function insertarTransaccion($transaccion){
            $cn = new Conexioon(); //Instanciando el objeto Conexión      
            $dbh = $cn->getConexion(); //Llamando el metodo conexión
            $sql = "INSERT INTO transaccion VALUES (:idTransaccion, :tipo, :monto, :numCuenta, :numCuentaRecep, :fecha)"; //Consulta SQL
            try{
                $stmt = $dbh->prepare($sql);
                if($stmt->execute((array)$transaccion)){ //Creando el objeto cuenta a un array
                    $valiTransaccion = 1;
                    return $valiTransaccion;
                }
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }

        public function actualizarMonto($newMonto,$numCuenta){
            $cn = new Conexioon();        
            $dbh = $cn->getConexion();
            $sql = "UPDATE cuentaahorro SET Fondos =:newMonto  WHERE NumCuenta=:cuenta";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':cuenta', $numCuenta);
                $stmt->bindParam(':newMonto', $newMonto);
                if($stmt->execute()){
                    ?>
                    <script>
                        alert("La transacción se ha realizado correctamente.");
                        window.location.href = "../../vista/login/movimientos_usu.php"; 
                    </script>
                  <?php
                }
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        } 

        public function mostrarTransacciones($numCuenta){
            $sql = "SELECT * FROM transaccion WHERE NumCuenta =:cuenta ORDER BY Fecha ASC;";
            $cn = new Conexioon();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':cuenta',$numCuenta);
            $stmt->execute();
            $monto = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $monto;
        }

        
    }
?>