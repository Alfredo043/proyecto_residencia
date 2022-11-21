<?php
  session_start();
  include ("../../../inc/conexion.php");

  $clave = (isset($_POST['Clave']))?$_POST['Clave']:'';
<<<<<<< HEAD
  date_default_timezone_set("America/Mexico_City");
  $mifecha = date('Y-m-d H:i:s');

  if($clave==''){
    echo 'No se pudo obtener la clave del curso';
=======

  if($clave==''){
    echo 'No se pudo obtener la clave del usuario';
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
    return;
  }

  try{
<<<<<<< HEAD
    $query = "UPDATE Curso SET Es_Cve_Estado = 'BA', Oper_Baja = '0', Fecha_Baja ='$mifecha' WHERE Cr_Cve_Curso ='$clave'";
    $result = mysqli_query($conn, $query);

    if($result){
      echo 'OK-El registro se ha actualizo con exito';
    }else{
      echo 'Hubo un problema al actualizar el registro';
      return;
=======
    $query = "UPDATE Usuario SET Es_Cve_Estado = 'BA' WHERE Us_Cve_Usuario ='$clave'";
    $result = mysqli_query($conn, $consulta);

    if($result){
      echo "El registro se ha actualizo con exito";
      // echo "El registro se ha eliminado con exito";
    }
    else{
      echo "Hubo un problema al actualizar el registro";
      // echo "Hubo un problema al borrar el registro";
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
    }
  }catch(Exception $e){
    echo $e->getMessage();
    return;
  }
  
  mysqli_close($conn);
?>