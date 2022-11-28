<?php
    session_start();
    include ("../../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']==''){
      echo 'Advertencia: Para agregar o modificar cursos, debes iniciar sesión con una cuenta de tipo administrador';
      return;
    }
    
    $IdUsuario = $_SESSION['usuario'];
    $IdUser = (isset($_POST['Us_Cve_Usuario']))?$_POST['Us_Cve_Usuario']:'';

    $Nombre = (isset($_POST['Us_Descripcion']))?$_POST['Us_Descripcion']:'';
    $Tipo = (isset($_POST['Tu_Cve_Tipo_Usuario']))?$_POST['Tu_Cve_Tipo_Usuario']:'';
    // $Descripcion = (isset($_POST['Cr_Descripcion']))?$_POST['Cr_Descripcion']:'';

    date_default_timezone_set("America/Mexico_City");
    $fechaActual = date('Y-m-d H:i:s');

    if($IdUser==''){
        echo 'Advertencia: Falta el nombre';
        return;
    }

    if($Nombre==''){
        echo 'Advertencia: Falta el nombre';
        return;
    }

    if($Tipo==''){
        echo 'Advertencia: Falta el tipo de usuario';
        return;
    }

    try{
        //Si es edicion se actualizan los datos
        $query = "";
        $query .= "UPDATE Usuario SET ";
        $query .= " Us_Descripcion = '".$Nombre."', ";
        $query .= " Tu_Cve_Tipo_Usuario = '".$Tipo."' ";
        $query .= "WHERE Us_Cve_Usuario = '$IdUser' ";
        
        if(mysqli_query($conn, $query)){
            echo "OK-Datos guardados correctamente";
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>