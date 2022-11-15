<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de usuarios</title>
  <link rel="stylesheet" href="../../estilo.css">
</head>
<body>
  <center>
    <div class="ancho inicio">
      <br>
      <h1>LISTA DE USUARIOS</h1>
      <br>
    </div>
    <table border='1' cellpadding='0' cellspacing='0' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>
    <tr>
      <th width='150' style='font-weight: bold'>USUARIO</th>
      <th width='150' style='font-weight: bold'>TIPO USUARIO</th>
      <th width='150' style='font-weight: bold'>NOMBRE</th>
      <th width='150' style='font-weight: bold'>EMAIL</th>
      <th width='150' style='font-weight: bold'>PASSWORD</th>
      <th width='150' style='font-weight: bold'>ESTADO</th>
    </tr>
   
    <?php
      include ("../../inc/conexion.php");
      $query="SELECT * FROM Usuario";
      $result = mysqli_query($conn, $query);
      while ($registro = mysqli_fetch_array($result)){
    
      echo "
        <tr>
          <td width='150'>".$registro['Us_Cve_Usuario']."</td>
          <td width='150'>".$registro['Tu_Cve_Tipo_Usuario']."</td>
          <td width='150'>".$registro['Us_Descripcion']."</td>
          <td width='150'>".$registro['Us_Email']."</td>
          <td width='150'>".$registro['Us_Password']."</td>
          <td width='150'>".$registro['Es_Cve_Estado']."</td>
        </tr>
      ";

      }
      mysqli_free_result($result);
    ?>
    </table>
  </center>
</body>
</html>