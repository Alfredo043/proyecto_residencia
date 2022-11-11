<?php

    session_start();
    if($_SESSION['cargo'] == 'Administrador'){
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ventana Administrador</title>
  </head>
  <body>
    <h1>Hola Administrador</h1>
  </body>
</html>

<?php
    } else {
        header("Location: login.php");
  }
?>
