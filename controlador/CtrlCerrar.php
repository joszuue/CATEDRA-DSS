<?php
    session_start();
    include_once "../modelo/classUser.php";

    $cerrar = new User();
    $cerrar->cerrarSesion();

    echo "<script>alert('Ha cerrado sesión')</script>";
    header('location:../index.html');
?>