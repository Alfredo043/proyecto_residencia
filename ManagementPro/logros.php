<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="google" value="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal de capacitación ManagementPro</title>
    <link rel="icon" type="image/png" href="imagenes/fondo_curso.jpg" />
    <link rel="stylesheet" href="css/site.css" />
    <link rel="stylesheet" href="movil.css" />
    <link rel="stylesheet" href="ipad.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link href="pace-master/themes/red/pace-theme-material.css" rel="stylesheet" />
    <script src="pace-master/pace.min.js"></script>

    <script
      src="https://kit.fontawesome.com/2ee0245f3d.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/wow.min.js"></script>
  </head>
  <body>
    <?php
      $page_base = './';
      include "./inc/base/header-gray-user.php";
    ?>
    <input type="button" value="refresh" onclick="location.reload();">
    <section class="ancho logros" style="text-align: -webkit-left;">
    <div role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="--value:65"></div>
      <div class="contenido_left">
        <h2 class="titulo">ManagementPro | Retail</h2>
        <h3>
          <span class="negritas">Mis logros</span>
        </h3>
      </div>
      <div class="modulos">
        <article id="nivel" class="etapa">
          <h2 class="subtitulo_naranja">NIVEL BÁSICO 1</h2>
          <!-- <p>Configuración inicial Retail</p> -->
          <br />
          <div class="comenzar">
            <p>Nivel de desempeño</p>
          </div>
        </article>
      </div>
      <hr>
      <br>
      <br>
      <div class="contenido_left">
        <h3>
          <span class="negritas">Capacitaciones en curso</span>
        </h3>
      </div>
      <div class="modulos">
        <article id="nivel" class="etapa">
          <h2 class="subtitulo_naranja">NIVEL BÁSICO 2</h2>
          <!-- <p>Configuración inicial Retail</p> -->
          <br />
          <div class="comenzar">
            <p>Avance 0%</p>
          </div>
        </article>
      </div>
    </section>
    <?php
      include "footer.php";
    ?>
    <!-- SCRIPT FUNCIONES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="funciones.js"></script>
  </body>
</html>
