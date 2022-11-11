<?php

    session_start();
    if($_SESSION['cargo'] == 'Partner'){
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ventana Partner</title>
  </head>
  <body>
    <h1>Hola Partner</h1>
  </body>
</html>

<?php
    } else {
        header("Location: login.php");
    }
?>
