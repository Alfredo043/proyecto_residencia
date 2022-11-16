<?php
    session_start();
    include ("../../../inc/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Lista de usuarios';
        $page_base = '../../';
        include ("../../../inc/base/head.php");
    ?>
  </head>
  <body>

  <?php
    $clave = $_REQUEST['Clave'];
    $consulta = "UPDATE Usuario SET Es_Cve_Estado = 'BA' WHERE Us_Cve_Usuario ='$clave'";
    // $consulta = "DELETE FROM Usuario WHERE Us_Cve_Usuario = '$clave'";
    $resultado = mysqli_query($conn, $consulta);

    if($resultado){
      echo "El registro se ha actualizo con exito";
      // echo "El registro se ha eliminado con exito";
    }
    else{
      echo "Hubo un problema al actualizar el registro";
      // echo "Hubo un problema al borrar el registro";
    }
  ?>
  </body>
</html>