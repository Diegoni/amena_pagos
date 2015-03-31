<?php 
    session_start(); 
    include_once('../config/includes.php'); 
    if(isset($_SESSION['nombre'])) { 
        session_destroy(); 
        header("Location: acceso.php"); 
    }else {
    	header("Location: acceso.php"); 
        //echo "Operación incorrecta."; 
    } 
?>