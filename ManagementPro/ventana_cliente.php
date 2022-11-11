<?php

    session_start();
    if($_SESSION['cargo'] == 'Cliente'){
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ventana Cliente</title>
  </head>
  <body>
    <h1>Hola Cliente</h1>
  </body>
</html>

<?php
    } else {
        header("Location: login.php");
    }
?>
