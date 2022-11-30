<?php
  session_start();
  include ("../../../inc/conexion.php");

  $clave = (isset($_POST['Clave']))?$_POST['Clave']:'';

  if($clave==''){
    echo 'No se pudo obtener la clave del usuario';
    return;
  }

  if($clave==$_SESSION['usuario']){
    echo 'No puede eliminar el usuario logeado';
    return;
  }

  try{
    $query = "UPDATE Usuario SET Es_Cve_Estado = 'BA' WHERE Us_Cve_Usuario ='$clave'";
    $result = mysqli_query($conn, $query);

    if($result){
      echo "OK-El registro se ha actualizo con exito";
      // echo "El registro se ha eliminado con exito";
    }
    else{
      echo "Hubo un problema al actualizar el registro";
      // echo "Hubo un problema al borrar el registro";
    }
  }catch(Exception $e){
    echo $e->getMessage();
    return;
  }
  
  mysqli_close($conn);
?>