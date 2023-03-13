<?php
     
    function validarTitular($cadena){
        $expresion = "/^[a-zA-Z]+(([' ][a-zA-Z áéíóúÁÉÍÓÚñÑ])?[a-zA-ZáéíóúÁÉÍÓÚñÑ]*)*$/";
        if(!preg_match($expresion, $cadena)){
            echo "<script>alert('ERROR. Formato incorrecto en los nombres');window. history. back(-1);</script>";
            $validar = 0;
            
        }else{
            $validar = 1;
        }
        return $validar;
    }

    function validarDui($cadena){
        $expresion = "/^([0-9]{8}[-]+[0-9]{1})+$/";
        if(!preg_match($expresion, $cadena)){
        echo "<script>alert('ERROR. Formato incorrecto en DUI');window. history. back(-1);</script>";
        $validar = 0;
        }else{
            $validar = 1;
        }
        return $validar;
    }

    function validarCantDui($dui){
        $dao = new DaoCuentaBanco(); 
        $cantidad = $dao->CantDui($dui);
        $total;
        foreach ($cantidad as $cantidades){
            $total = $cantidades;
        }
    
        return $total;
    }

    function validarMonto($monto, $tipo, $numCuenta){
        $validar;
        if($tipo == "Deposito"){
            if($monto <= 0){
                echo "<script>alert('ERROR. El monto no puede ser menor o igual a cero');window. history. back(-1);</script>";
                $validar = 0;
            }else{
                $validar = 1;
            }
            return $validar;
        }

        if($tipo == "Retiro"){
            $misCuentas = new DaoCuentaBanco(); 
            $Cuentas = $misCuentas->mostrarMiCuenta($numCuenta);
            if($monto <= 0){
                echo "<script>alert('ERROR. El monto no puede ser menor o igual a cero');window. history. back(-1);</script>";
                $validar = 0;
            }else{
                foreach($Cuentas as $cuenta){
                    $mont = $cuenta['Fondos'];
                    if($mont < $monto){
                        echo "<script>alert('Fondos insuficientes...');window. history. back(-1);</script>";
                        $validar = 0;
                    }else{
                        $validar = 1;
                    }
                }
            }
            return $validar;
        }
        
    }

    function validarExistencia($monto, $numCuentaRecep, $numCuenta){
        $mensaje = 0;
        $validar = 0;
        $val = 0;
        if($monto <= 0){
            echo "<script>alert('ERROR. El monto no puede ser menor o igual a cero');window. history. back(-1);</script>";
            $validar = 0;
        }else{
            $validar2 = 1;
            $misCuentas = new DaoCuentaBanco(); 
            $Cuentas = $misCuentas->mostrarTodo();
            
            foreach($Cuentas as $cuenta){
                $cuenta1 = $cuenta['NumCuenta'];
                if($numCuentaRecep == $cuenta1){
                    $Cuentas = $misCuentas->mostrarMiCuenta($numCuenta);
                    foreach($Cuentas as $cuenta){
                        $mont = $cuenta['Fondos'];
                        if($mont < $monto){
                            echo "<script>alert('Fondos insuficientes...');window. history. back(-1);</script>";
                            $validar = 0;
                        }else{
                            $validar = 1;
                        }
                    }
                    return $validar;
                }else{
                    $mensaje = 0;
                }
            }

            if($mensaje == 0){
                echo "<script>alert('La cuenta: " . $numCuentaRecep  .", no existe');window. history. back(-1);</script>";
            }
        }
    }

    function valiEliminar($numCuenta){
        $misCuentas = new DaoCuentaBanco(); 
        $Cuentas = $misCuentas->mostrarMiCuenta($numCuenta);
        $validar ;
        foreach($Cuentas as $fondo){
            if($fondo['Fondos'] > 0){
                echo "<script>alert('No puedes eliminar la cuenta " . $numCuenta . ", aún posees $" .$fondo['Fondos'] . "');window. history. back(-1);</script>";
                $validar = 0;
            }else{
                $validar = 1;
            }
        }
        return $validar;
    }


?>