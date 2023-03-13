<?php
    require_once "../Modelo/classConexion.php";
    require_once "../Modelo/classUser.php";
    $user = new User();
    
    if(isset($_POST['subir'])){
        $terminos = $_POST['remember-me'];
        if(isset($terminos)){
            $correo = $_POST['username'];
            $contra = $_POST['pass'];
            
            echo $terminos;
            if($user->userExists($correo, $contra)){
                session_start();
                $_SESSION['correo'] = $correo;
                header("location:../vista/login/index.php");
            } else {
                echo "<script>alert('Correo o contraseña invalido');window. history. back(-1);</script>";
            }
        }else {
            echo "<script>alert('Debe aceptar los terminos y condiciones');window. history. back(-1);</script>";
        }
        
    } else {
        echo "<script>alert('No oprimio nada'); window.history.back(-1);</script>";
    }


?>