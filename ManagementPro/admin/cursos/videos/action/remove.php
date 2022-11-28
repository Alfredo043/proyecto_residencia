<?php
  session_start();
  include ("../../../../inc/conexion.php");

  if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
  if($_SESSION['usuario']==''){
    echo 'Advertencia: Para eliminar cursos, debes iniciar sesión con una cuenta de tipo administrador';
    return;
  }

  $Cv_Cve_Curso_Video = (isset($_POST['Cv_Cve_Curso_Video']))?$_POST['Cv_Cve_Curso_Video']:'';
  // date_default_timezone_set("America/Mexico_City");
  // $fechaActual = date('Y-m-d H:i:s');

  if($Cv_Cve_Curso_Video==''){
    echo 'No se pudo obtener la clave del video';
    return;
  }
  
  try{
    $query = "";
    $query .= "UPDATE Curso_Video SET ";
    $query .= " Es_Cve_Estado = 'BA' ";
    $query .= "WHERE Cv_Cve_Curso_Video ='$Cv_Cve_Curso_Video' ";
    
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