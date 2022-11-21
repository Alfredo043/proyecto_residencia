<?php
  session_start();
  include ("../../../inc/conexion.php");

  $clave = (isset($_POST['Clave']))?$_POST['Clave']:'';
  date_default_timezone_set("America/Mexico_City");
  $mifecha = date('Y-m-d H:i:s');

  if($clave==''){
    echo 'No se pudo obtener la clave del curso';
    return;
  }

  try{
    $query = "UPDATE Curso SET Es_Cve_Estado = 'BA', Oper_Baja = '0', Fecha_Baja ='$mifecha' WHERE Cr_Cve_Curso ='$clave'";
    $result = mysqli_query($conn, $query);

    if($result){
      echo 'OK-El registro se ha actualizo con exito';
    }else{
      echo 'Hubo un problema al actualizar el registro';
      return;
    }
  }catch(Exception $e){
    echo $e->getMessage();
    return;
  }
  
  mysqli_close($conn);
?>