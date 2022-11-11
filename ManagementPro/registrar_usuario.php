<?php
    session_start();
    session_destroy();
    include ("conexion_registro.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="google" value="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Registro de usuario </title>
    <link rel="icon" type="image/png" href="imagenes/fondo_curso.jpg" />
    <link rel="stylesheet" href="estilo.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="slidefoto">
      <div class="contenedoregistro">
        <div class="contenedorlogotipo">
          <figure>
            <img src="imagenes/logo_gris.png" alt="" />
          </figure>
        </div>
        <div class="contenedor_info_centro">
          <!-- Comienza el metodo POST -->
          <form method="POST">

            <!-- Añadipo por mi -->
            <input class="elementos" type="text" name="nombre" placeholder="Nombre(s)" required/>
            <input class="elementos" type="text" name="correo" id="correo" placeholder="Correo electrónico" required/>
            <input class="elementos" type="password" name="contrasena" placeholder="Contraseña" id="pass" required/>
            <div class="recordar">
              <input type="checkbox" name="php" onclick="myFuction()" />
              <label for="">Mostrar Contraseña</label><br />
            </div>

            <!-- Cambiado para que me permitiera registrar -->
            <input type="submit" class="btn_ingresar" value="Registrar" name="registrarUsuario"></input>
          </form>
        </div>
      </div>
    </section>
    <script>
      function myFuction() {
        var tipo = document.getElementById("pass");
        if (tipo.type == "password") {
          tipo.type = "text";
        } else {
          tipo.type = "password";
        }
      }
    </script>
  </body>
</html>