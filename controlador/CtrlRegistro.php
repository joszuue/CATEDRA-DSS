<?php

    require_once "../Modelo/classConexion.php";
    require_once "../Modelo/daoRegistro.php";

    $accion = ($_POST['Enviar'])?$_POST['Enviar']:"";

    if($accion = "User"){
        $nombres = ($_POST['nombres'])?$_POST['nombres']:"";
        $DUI = ($_POST['DUI'])?$_POST['DUI']:"";
        $apellidos = ($_POST['apellidos'])?$_POST['apellidos']:"";
        $fechaNac = ($_POST['fechaNac'])?$_POST['fechaNac']:"";
        $correo = ($_POST['correo'])?$_POST['correo']:"";
        $depart = ($_POST['depart'])?$_POST['depart']:"";
        $sueldo = ($_POST['sueldo'])?$_POST['sueldo']:"";
        $telefono = ($_POST['telefono'])?$_POST['telefono']:"";
        $contra = ($_POST['contra'])?$_POST['contra']:"";

        $correoregx = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";      
        $texto = "/^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/";
        $ct="/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
        $duiss = "/^\d{8}-\d{1}$/";
        $decEx = "/[0-9][.][0-9]/";
        $intEx = "/^\d+$/";
        $telefonoRegx = "/^(2|7)\d{3}-\d{4}$/";
        $contraRegx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/";

        $registro = new Registro;
        $unico = $registro->verifyDui($DUI);
        $correounico = $registro->verifyCorreo($correo);

        if(preg_match($texto, $nombres) || $nombres == "" || $nombres == null){
            if(preg_match($texto, $apellidos) || $apellidos == "" || $apellidos == null){
                if(preg_match($correoregx, $correo) || $correo == "" || $correo == null){
                    if(preg_match($decEx, $sueldo) || preg_match($intEx, $sueldo) || $sueldo == "" || $sueldo == null){
                        if(preg_match($telefonoRegx, $telefono) || $telefono = "" || $telefono == null){
                            if(preg_match($duiss, $DUI) && !$unico || $DUI == "" || $DUI == null){
                                if(preg_match($contraRegx, $contra) || $contra == "" || $contra == null){
                                    if(!$correounico){
                                        //SE VERIFICA QUE TODOS LOS DATOS ESTAN CORRECTOS QUE EL DUI SEA UNICO
                                        $registro->Insertar($DUI, $nombres, $apellidos, $fechaNac, $telefono, $correo, $contra, $depart, $sueldo);
                                        session_start();
                                        $_SESSION['correo'] = $correo;      
                                        header('location:../vista/login/index.php');
                                    } else {
                                        echo "<script>alert('El correo ingresado ya está registrado, ingrese otro');window. history. back(-1);</script>";
                                    }
                                } else {
                                    echo "<script>alert('La contra debe tener al menos una mayuscula, minuscula y un numero');window. history. back(-1);</script>";
                                }
                            }else {
                                echo "<script>alert('Formato de DUI incorrecto o ya existe una cuenta con este DUI');window. history. back(-1);</script>";
                            }
                        } else {
                            echo "<script>alert('Formato de telefono incorrecto');window. history. back(-1);</script>";
                        }
                    } else {
                        echo "<script>alert('Formato de sueldo incorrecto');window. history. back(-1);</script>";
                    }
                } else {
                    echo "<script>alert('Formato de correo incorrecto');window. history. back(-1);</script>";
                }
            } else {
                echo "<script>alert('Formato de apellido incorrecto');window. history. back(-1);</script>";
            }
        } else {
            echo "<script>alert('Formato de nombre incorrecto');window. history. back(-1);</script>";
        }
    }
?>