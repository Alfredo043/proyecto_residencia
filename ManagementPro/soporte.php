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
      .fixed .cabecera_gris {
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
      include "./inc/base/header-gray.php";
    ?>
    <div class="fondo_gris">
      <div class="ancho contenedor_titulo">
        <div class="titulo_descarga">
          <h2 class="subtitulo_azul">Descargar</h2>
          <p>
            Para darte soporte y asesoría técnica descarga alguno de los
            diferentes medios que tenemos a continuación
          </p>
          <div class="botones">
            <a
              href="https://www.teamviewer.com/es-mx/"
              target="_blank"
              id="btn_azul"
              ><i class="fa-solid fa-download"></i> TeamViewer</a
            >
            <a href="https://anydesk.com/es" target="_blank" id="btn_naranja"
              ><i class="fa-solid fa-download"></i> AnyDesk Windows</a
            >
          </div>
        </div>
        <figure><img src="imagenes/fondo_descarga.png" alt="" /></figure>
      </div>
    </div>
    <br />
    <section class="ancho soporte">
      <div class="contenido_centrado">
        <h2 class="titulo">Soporte Técnico</h2>
        <p>
          ManagementPro cuenta con un equipo profesional de asistencia técnica
          capacitado para asistirlo en cualquier momento.
        </p>
      </div>
      <div class="informacion_soporte">
        <div class="nuestro_servicio">
          <p class="negritas">
            Nuestro servicio de soporte le ofrece los siguientes beneficios:
          </p>
          <div class="check">
            <i class="tamañoicono fa-sharp fa-solid fa-circle-check"></i>
            <p>Ayuda a distancia a través de herramientas tecnológicas.</p>
          </div>
          <div class="check">
            <i class="tamañoicono fa-sharp fa-solid fa-circle-check"></i>
            <p>
              Atención personalizada con base en sus necesidades específicas.
            </p>
          </div>
          <div class="check">
            <i class="tamañoicono fa-sharp fa-solid fa-circle-check"></i>
            <p>
              Tiempos de respuesta más cortos que con otros servicios, hasta 50%
              más rápido.
            </p>
          </div>
          <div class="check">
            <i class="tamañoicono fa-sharp fa-solid fa-circle-check"></i>
            <p>
              Trabajamos para resolver sus dudas y nos ajustamos a sus
              necesidades, para nosotros usted es lo más importante.
            </p>
          </div>
        </div>
        <figure>
          <img src="imagenes/inicio_soporte.png" alt="" />
        </figure>
      </div>
    </section>
    <div class="calltoaction_gris">
      <div class="ancho" id="cont_call">
        <div class="banner">
          <div class="texto_banner">
            <h2 class="subtitulo_naranja">Importante</h2>
            <p>
              Para ser atendido por un asesor, será necesario haber concluido el
              curso
            </p>
          </div>
          <div class="botones">
            <a
              href="https://community.mproerp.com/"
              target="_blank"
              id="btn_azul"
              ><i class="fa-solid fa-comments"></i> COMMUNITY</a
            >
          </div>
        </div>
      </div>
    </div>
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
