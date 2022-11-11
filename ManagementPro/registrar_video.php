<?php
    session_start();
    session_destroy();
    include ("conexion_registrar_video.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="google" value="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Registro de video </title>
    <link rel="icon" type="image/png" href="imagenes/fondo_curso.jpg" />
    <link rel="stylesheet" href="estilo.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="cursos">
      <div class="contenedoregistro">
        <div class="contenedorvideo">
          <div class="titulovideo">
            <h3>REGISTRAR VIDEO PARA EL SITIO DE CAPACITACIÓN</h3>
          </div>
        </div>
        <div class="contenedor_info_centro">
          <!-- Comienza el metodo POST -->
          <form method="POST">

            <!-- Añadipo por mi -->
            <input class="elementos" type="text" name="titulo" placeholder="Nombre del video" required/>
            <input class="elementos" type="text" name="descripcion" placeholder="Descripción del video" required/>
            <input class="elementos" type="text" name="url" placeholder="URL del video" required/>

            <!-- Cambiado para que me permitiera registrar -->
            <input type="submit" class="btn_ingresar" value="Agregar" name="registrarVideo"></input>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>