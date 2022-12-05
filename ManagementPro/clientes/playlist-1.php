<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="google" value="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal de capacitación ManagementPro</title>
    <link rel="icon" type="image/png" href="../imagenes/fondo_curso.jpg" />
    <link rel="stylesheet" href="../css/site.css" />
    <link rel="stylesheet" href="../movil.css" />
    <link rel="stylesheet" href="../ipad.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/2ee0245f3d.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/wow.min.js"></script>
  </head>
  <body>
    <!-- FLECHA -->
    <a class="ir_arriba" href="#">
      <i class="fa fa-arrow-up fa-1x"></i>
    </a>
    <header>
      <div class="cabecera_azul">
        <div class="ancho cabeceraredes">
          <div class="correo">
            <a href="mailto:soporte@mproerp.com"
              ><i class="separaricono fa-solid fa-envelope-open-text"></i>
              <span>soporte@mproerp.com</span></a
            >
          </div>
          <div class="redes">
            <a href="https://www.facebook.com/mproerp" target="_blank"
              ><i class="fa-brands fa-facebook-f"></i
            ></a>
            <a
              href="https://www.linkedin.com/company/managementpro"
              target="_blank"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="cabecera">
        <div class="ancho contenedorcabecera">
          <div class="alineacion">
            <figure>
              <img src="../imagenes/logo_azul.png" alt="" />
            </figure>
            <div class="contenedoricono">
              <i id="iconomenu" class="fas fa-bars fa-2x"></i>
            </div>
          </div>
          <nav>
            <ul id="menu" class="contenedormenu">
              <li><a href="../index.php" class="linea">Inicio</a></li>
              <span>|</span>
              <li>
                <a href="../clientes.php" class="linea">Capacitación</a>
              </li>
              <span>|</span>
              <li><a href="../soporte.php" class="linea">Soporte</a></li>
              <span>|</span>
              <li><a href="../contacto.php" class="linea">Contacto</a></li>
              <li>
                <a href="../login.php" id="btn_azul"
                  >Iniciar Sesión <i class="fa-solid fa-right-to-bracket"></i
                ></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <?php
        include "../inc/conexion.php";
        $todos="SELECT * FROM Curso_Video";
        $resultado = mysqli_query($conn, $todos);
        while ($row = mysqli_fetch_assoc($resultado)){
          echo $row["Cv_Titulo"]."<br>";
          echo $row["Cv_Url"]."<br>";
          echo $row["Cv_Descripcion"]."<br><br>";
        // }
    ?>
    <div class="division ancho">
      <div class="playlist">
        <h2 class="subtitulo_azul">Configuración inicial Retail</h2>
        <div class="tiempo">
        <div class="check">
          <i class="tamañoicono fa-solid fa-circle-play"></i>
          <p>7 clases</p>
        </div>
        <div class="check">
          <i class="tamañoicono fa-regular fa-clock"></i>
          <p>2hrs. 45min</p>
        </div>
        </div>
        <hr />

        <div class="menutabs">
          <div class="check-video">
            <a href="#op1" id="btn2" class="link"
              ><i class="tamañoicono fa-solid fa-circle-play"></i>1. Crear Base
              de Datos</a
            >
          </div>
        </div>
      </div>
      <section id="contenedor_tabs">
        <article id="op1">
          <div id="contenedoryoutube">
            <iframe
              src="https://www.youtube.com/embed/LIo4vWmLQZg"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>
          <div class="descripcion">
            <p class="negritas">Descripción</p>
            <hr />
            <p>
              Aprende a crear una base de datos en el Sistema y realizar la
              configuración inicial de tu empresa.
            </p>
          </div>
        </article>
      </section>
    </div>
    <?php
      }
      mysqli_free_result($resultado);
    ?>
    <footer>
      <div id="contenidofooter" class="ancho">
        <figure>
          <img src="../imagenes/logo_gris.png" alt="" />
        </figure>
        <div id="centro">
          <b>Contáctenos</b>
          <hr />
          <a href="mailto:soporte@mproerp.com"
            ><i class="separaricono fa-solid fa-envelope-open-text"></i>
            <span>soporte@mproerp.com</span></a
          >
        </div>
        <div id="derecha">
          <b>Síguenos En</b>
          <hr />
          <div class="redesociales">
            <a href="#" class="circuloredes">
              <i class="fa-brands fa-google-plus-g"></i>
            </a>
            <a
              href="https://twitter.com/mproerp"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-twitter"></i>
            </a>
            <a
              href="https://www.linkedin.com/company/managementpro"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
            <a
              href="https://www.facebook.com/mproerp"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a
              href="https://www.youtube.com/c/ManagementProERP"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
      <br />
      <hr />
      <br />
      <div class="ancho" id="copy">
        <p>
          &copy; 2022 | ManagementPro Inc | 12 South 1st. Street Ste. 1100, San
          José, CA, 95113
        </p>
      </div>
    </footer>
    <!-- SCRIPT FUNCIONES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../funciones.js"></script>
  </body>
</html>
