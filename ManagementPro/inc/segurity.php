<?php
    $baseuriseg = (isset($baseuriseg)?$baseuriseg:'./');
    $urlActual = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    
    //Validamos si es la pagina de administrador
    $pos = strpos($urlActual,'/admin/');
    if($pos !== false){
        //Si se encontro se valida que este logueado el usuario
        if($_SESSION['usuario']==''){
            //No hay usuario logueado, lo mandamos al login
            header('Location: '.$baseuriseg.'usuario/login/');
            exit();
        }
    }
?>