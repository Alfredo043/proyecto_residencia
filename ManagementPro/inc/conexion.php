<?php
    $_SESSION['error'] = '';
    $_SESSION['conexion'] = 'NO';

    try {
        $db_server = 'localhost';
        $db_name = 'proyecto';
        $db_user = 'root';
        $db_pass = '';
        
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        
        if(!$conn){
            $_SESSION['error'] = 'Conexion: '.mysqli_connect_error();
        }else{
            $_SESSION['error'] = '';
            $_SESSION['conexion'] = 'SI';
        }
    }catch(Exception $e){
        $_SESSION['error'] = 'Ocurrio un error: '.$e->getMessage();
    }
    
?>