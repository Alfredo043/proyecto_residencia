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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/2ee0245f3d.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/wow.min.js"></script>
    <style>
      #menu_fixed {
        height: 110px;
        /* margin: 10px 0 0; */
        transition: height 1s ease 0s;
      }
      .fixed .cabecera {
        background-color: white;
        box-shadow: 0 6px 6px -6px #777;
        width: 100%;
        /* height: 55px !important; */
        position: fixed;
        top: 0;
        z-index: 3;
      }
    </style>
  </head>
  <body>
    <?php
      $page_base = './';
      include "./inc/base/header-white.php";
    ?>
    <section class="ancho contacto">
      <br>
      <h2 class="titulo">Contáctanos</h2>
      <div class="informacion_contacto">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.263679763084!2d-89.64736268559274!3d21.02213299338165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5674402196cc63%3A0xa7e40b98e612a113!2sClustar!5e0!3m2!1ses!2smx!4v1664727778042!5m2!1ses!2smx"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
        <div class="nuestro_contacto">
          <div class="texto_contacto">
            <i class="tamañoicono fa-solid fa-location-dot"></i>
            <p>
              <span class="negritas">Dirección:</span> <br />
              C-61 #217 Fco. de Montejo 97203, <br />
              Mérida Yucatán. <br />
              México.
            </p>
          </div>
          <br />
          <div class="texto_contacto">
            <i class="tamañoicono fa-solid fa-envelope"></i>
            <p>
              <span class="negritas">Email:</span> <br />
              <b>Ventas:</b> ventas@mproerp.mx <br />
              <b>Soporte:</b> soporte@mproerp.mx
            </p>
          </div>
          <br />
          <div class="texto_contacto">
            <i class="tamañoicono fa-sharp fa-solid fa-phone-flip"></i>
            <p>
              <span class="negritas">Teléfono:</span> <br />
              (999) 400 0041
            </p>
          </div>
          <br />
          <div class="texto_contacto">
            <i class="tamañoicono fa-solid fa-clock"></i>
            <p>
              <span class="negritas">Horarios de atención:</span> <br />
              <b>Lunes a viernes </b> 9:00 a.m. – 6:00 p.m. <br />
              <b>Sábados de</b> 9:00 a.m. - 1:00 p.m.
            </p>
          </div>
        </div>
      </div>
    </section>
    <?php
      include "footer.php";
    ?>
    <!-- SCRIPT FUNCIONES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="funciones.js"></script>

    <script>
      $(function(){
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('#menu_fixed').offset().top + 160;
 
        $(window).scroll(function(){
          if( $(window).scrollTop() > stickyHeaderTop ) {
                  $('#menu_fixed').addClass('fixed');
          } else {
                  $('#menu_fixed').removeClass('fixed');
          }
        });
    });
    </script>
  </body>
</html>
