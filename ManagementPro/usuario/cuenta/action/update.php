<?php
  session_start();
  include ("../../../inc/conexion.php");

  $Nombre = (isset($_POST['nombre']))?$_POST['nombre']:'';
  $Email = (isset($_POST['email']))?$_POST['email']:'';
  $Password = (isset($_POST['password']))?$_POST['password']:'';
  $clave = (isset($_POST['Clave']))?$_POST['Clave']:'';

  if($Nombre==''){
    echo 'Falta el nombre del usuario';
    return;
  }

  if($Email==''){
      echo 'Falta el correo electrónico';
      return;
  }

  if($Password==''){
      echo 'Falta la contraseña';
      return;
  }

  if($clave==''){
    echo 'No se pudo obtener la clave del usuario';
    return;
  }

  try{
    $query = "UPDATE Usuario SET Us_Descripcion ='$Nombre', Us_Email ='$Email', Us_Password ='$Password' WHERE Us_Cve_Usuario ='$clave'";
    $result = mysqli_query($conn, $query);

    if($result){
      echo "Se actualizo los datos correctamente";
      // echo "El registro se ha eliminado con exito";
    }
    else{
      echo "Hubo un problema al actualizar los datos";
      // echo "Hubo un problema al borrar el registro";
    }
  }catch(Exception $e){
    echo $e->getMessage();
    return;
  }
  
  mysqli_close($conn);
?>