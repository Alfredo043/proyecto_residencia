<?php
  session_start();
  include ("../../../inc/conexion.php");

  if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
  if($_SESSION['usuario']==''){
    echo 'Advertencia: Para eliminar cursos, debes iniciar sesión con una cuenta de tipo administrador';
    return;
  }

  $Cr_Cve_Curso = (isset($_POST['Cr_Cve_Curso']))?$_POST['Cr_Cve_Curso']:'';
  date_default_timezone_set("America/Mexico_City");
  $fechaActual = date('Y-m-d H:i:s');

  if($Cr_Cve_Curso==''){
    echo 'No se pudo obtener la clave del curso';
    return;
  }
  
  try{
    $query = "";
    $query .= "UPDATE Curso SET ";
    $query .= " Es_Cve_Estado = 'BA', ";
    $query .= " Oper_Baja = '".$_SESSION['usuario']."', ";
    $query .= " Fecha_Baja ='$fechaActual' ";
    $query .= "WHERE Cr_Cve_Curso ='$Cr_Cve_Curso' ";
    
    if(mysqli_query($conn, $query)){
        echo "OK-El registro se elimino correctamente";
    }else{
        echo "Error: ".mysqli_error($conn);
    }
  }catch(Exception $e){
    echo "Error: ".$e->getMessage();
    return;
  }
  
  mysqli_close($conn);
?>