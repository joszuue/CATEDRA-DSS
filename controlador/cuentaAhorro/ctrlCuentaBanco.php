<?php
    require_once("../../modelo/cuentaAhorro/classCuentaBanco.php");
    require_once("../../modelo/cuentaAhorro/classTransaccion.php");

    require_once("../../modelo/cuentaAhorro/daoCuentaBanco.php");
    require_once("../../modelo/cuentaAhorro/daoTransaccion.php");
    //
    require_once("../validaciones.php");
    require_once("mostrar.php");
    //FECHA
    
    $accion = isset($_POST['accion'])?$_POST['accion']:"";
    if($accion == "Crear Cuenta de ahorro"){
        $titular = isset($_POST['titular'])?$_POST['titular']:"";
        $dui = isset($_POST['dui'])?$_POST['dui']:"";
        //INICIO DE FUNCIONES QUE VALIDAN LOS DATOS INGRESADOS
        $validar1 = validarTitular($titular);
        $validar2 = validarDui($dui);
        //$validar3 = validarCantDui($dui);
        //FIN DE FUNCIONES DE VALIDACIÓN
        
        if($validar1 == 1 && $validar2 == 1){
            $estado = "Activo";
            //Función para general números aleatorios
            mt_srand (time());
            $NumCuenta = mt_rand(100000000,999999999);
            //Fin función para general números aleatorios
            
            $cuenta = new cuentaBanco($NumCuenta, $dui, $titular, $estado); //Instanciando Objeto cuentaBanco y pasandoles las variables para el constructor
            
            $dao = new DaoCuentaBanco(); //Intanciando objeto DaoCuentaBanco
            $dao->insertarCuenta($cuenta); //Enviandole el objeto al metodo insertarCuenta
        }
    }

    if($accion == "Depositar"){
        $numCuenta = isset($_POST['NumCuenta'])?$_POST['NumCuenta']:"";
        $monto = isset($_POST['monto'])?$_POST['monto']:"";
        $tipo = "Deposito";
        $valiMonto = validarMonto($monto, $tipo, $numCuenta);

        if($valiMonto == 1){
            mt_srand (time());
            $idTransaccion = mt_rand(100000,999999);
            $numCuentaRecep = $numCuenta;
            $fecha = date('Y-m-d');
            $transaccion = new Transaccion($idTransaccion, $tipo, $monto, $numCuenta, $numCuentaRecep, $fecha);

           $dao = new DaoTransaccion();
           $valiTransaccion = $dao->insertarTransaccion($transaccion);

           if($valiTransaccion == 1){
             $newMonto = selectMonto($numCuenta, $monto, $tipo);
             $dao->actualizarMonto($newMonto,$numCuenta);
           }
        }
    }

    if($accion == "Retirar"){
        $numCuenta = isset($_POST['NumCuenta'])?$_POST['NumCuenta']:"";
        $monto = isset($_POST['monto'])?$_POST['monto']:"";
        $tipo = "Retiro";
        $valiMonto = validarMonto($monto, $tipo, $numCuenta);
        if($valiMonto == 1){
            mt_srand (time());
            $idTransaccion = mt_rand(100000,999999);
            $numCuentaRecep = $numCuenta;
            $fecha = date('Y-m-d');
            $transaccion = new Transaccion($idTransaccion, $tipo, $monto, $numCuenta, $numCuentaRecep, $fecha);

           $dao = new DaoTransaccion();
           $valiTransaccion = $dao->insertarTransaccion($transaccion);

           if($valiTransaccion == 1){
             $newMonto = selectMonto($numCuenta, $monto, $tipo);
             $dao->actualizarMonto($newMonto,$numCuenta);
           }
        }
    }

    if($accion == "Transferir"){
        $numCuenta = isset($_POST['NumCuenta'])?$_POST['NumCuenta']:"";
        $monto = isset($_POST['monto'])?$_POST['monto']:"";
        $numCuentaRecep = isset($_POST['NumRecep'])?$_POST['NumRecep']:"";
        $tipo = "Transferencia";
        $valiMonto = validarExistencia($monto, $numCuentaRecep, $numCuenta);
        if($valiMonto == 1){
            mt_srand (time());
            $idTransaccion = mt_rand(100000,999999);
            $fecha = date('Y-m-d');
            $transaccion = new Transaccion($idTransaccion, $tipo, $monto, $numCuenta, $numCuentaRecep, $fecha);
            $fecha = date('Y-m-d');
           $dao = new DaoTransaccion();
           $valiTransaccion = $dao->insertarTransaccion($transaccion);
           
           if($valiTransaccion == 1){
            $newMonto1 = selectMonto($numCuenta, $monto, "Retiro");
            $dao->actualizarMonto($newMonto1,$numCuenta);
            $newMonto2 = selectMonto($numCuentaRecep, $monto, "Deposito");
            $dao->actualizarMonto($newMonto2,$numCuentaRecep);
            
          }
        }

    }

    if($accion == "Eliminar cuenta"){
        $numCuenta = isset($_POST['NumCuenta'])?$_POST['NumCuenta']:"";
        $vali = valiEliminar($numCuenta);

        if($vali == 1){
            $estado = "Inactiva";
            $dao = new DaoCuentaBanco(); 
            $dao->eliminarCuenta($numCuenta, $estado);
        }
        


    }
?>