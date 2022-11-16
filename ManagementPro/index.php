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
    <link rel="stylesheet" href="estilo.css" />
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
    <script
      src="https://kit.fontawesome.com/2ee0245f3d.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/wow.min.js"></script>
  </head>
  <body>
    <?php
      include "header-gray.php";
    ?>
    <div class="fondo_gris">
      <div class="ancho contenedor_titulo">
        <div class="titulo_inicio">
          <h1 class="titulo">Portal de capacitación ManagementPro</h1>
          <p>
            Capacítate en nuestro mejor punto de venta ManagementPro | RETAIL
            tomando un curso totalmente gratis donde finalmente adquirirá un
            gran conocimiento y aprenderá a utilizar nuestro sistema punto de
            venta en su negocio con atención al público.
          </p>
          <a href="#mas-informacion" id="btn_naranja" class="btn_ancla">
            Más información</a
          >
        </div>
        <figure><img src="imagenes/fondo_inicio_mpro.png" alt="" /></figure>
      </div>
    </div>
    <br />
    <section class="ancho nosotros">
      <div class="contenido_centrado">
        <h2 class="subtitulo_azul">Nosotros</h2>
        <p>
          ManagementPro es una empresa de software que diseña Sistemas
          Administrativos y Sistemas de Gestión ERP que gracias a sus
          características en cuanto a flexibilidad tienen la capacidad de
          adaptarse completamente a las necesidades de las empresas sin importar
          el giro que desempeñen.
        </p>
      </div>
    </section>
    <section class="ancho acerca_este_curso">
      <div class="contenido_centrado">
        <h2 class="subtitulo_azul">Acerca de este curso</h2>
        <p>
          En este curso aprenderá a configurar acciones a través de los
          diferentes módulos que tiene nuestro sistema punto de venta
          ManagementPro | RETAIL.
        </p>
      </div>
      <div class="informacion_punto_venta">
        <div class="importancia">
          <div class="check">
            <i class="tamañoicono fa-solid fa-caret-right"></i>
            <p>
              Con el Punto de Venta de
              <span class="negritas">ManagementPro</span> podrás llevar un mejor
              control completo de tus
              <span class="negritas"
                >ventas, inventarios y cuentas por cobrar</span
              >
              de una forma práctica y sencilla.
            </p>
          </div>
          <div class="check separador">
            <i class="tamañoicono fa-solid fa-caret-right"></i>
            <p>
              Para darle un vistazo general al funcionamiento del Punto de venta
              de ManagementPro dale
              <span class="negritas"
                ><a
                  href="https://www.youtube.com/embed/kyA_IWuR8Qs"
                  target="_blank"
                  >clic al video.</a
                ></span
              >
            </p>
          </div>
        </div>
        <article>
          <div id="contenedoryoutube">
            <iframe
              src="https://www.youtube.com/embed/kyA_IWuR8Qs"
              title="YouTube video player"
              frameborder="0"
              allowfullscreen
            ></iframe>
          </div>
        </article>
      </div>
    </section>
    <section class="ancho experiencia">
      <figure><img src="imagenes/inicio_mpro.jpg" alt="" /></figure>
      <div class="texto_experiencia">
        <h2 class="subtitulo_azul">Experiencias increíblemente fantásticas</h2>
        <p>
          Más que un sistema, somos ManagementPro, una forma de trabajar que da
          resultados.
        </p>
        <div class="caracteristicas_curso">
          <p class="negritas">Características del curso</p>
          <p>
            <i class="tamañoicono fa-sharp fa-solid fa-circle-check"></i
            >Tutoriales en vídeo
          </p>
          <p>
            <i class="tamañoicono fa-sharp fa-solid fa-circle-check"></i
            >Consejos fáciles de aplicar
          </p>
          <p>
            <i class="tamañoicono fa-sharp fa-solid fa-circle-check"></i>Acceso
            ilimitado
          </p>
        </div>
        <a href="capacitacion.php" id="btn_naranja">Capacítate ahora mismo</a>
      </div>
    </section>
    <div class="calltoaction">
      <div class="ancho" id="cont_call">
        <div class="texto">
          <h2 class="subtitulo_naranja">Premisas</h2>
          <p>Servicios Integrales con la más alta calidad</p>
          <div class="servicio">
            <div class="iconoservicio">
              <i class="fa-solid fa-shield-halved"></i>
              <p>Seguridad</p>
            </div>
            <div class="iconoservicio">
              <i class="fa-solid fa-clock"></i>
              <p>Servicio</p>
            </div>
            <div class="iconoservicio">
              <i class="fa-solid fa-hand-holding-dollar"></i>
              <p>Seguimiento</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="mas-informacion" class="ancho requerimientos">
      <div class="contenido_centrado">
        <h2 class="subtitulo_azul">Requerimientos</h2>
        <p>
          El usuario debe tener al menos el sistema punto de venta ManagementPro
          | RETAIL instalado en su equipo de cómputo, ya que los videos de
          capacitación se basan en el uso del software disponible. Es deseable
          que cuente también con una licencia para el uso de su punto de venta.
        </p>
      </div>
      <div class="nuestros_requerimientos">
        <article class="iconorequerimiento">
          <i class="fa-solid fa-face-smile-beam"></i>
          <p class="subtitulo_azul">Fácil de usar</p>
          <p>
            Interfaz amigable y fácil de usar.
            <span class="negritas"
              >Diseño intuitivo para mejorar la experiencia del usuario.</span
            >
          </p>
        </article>
        <article class="iconorequerimiento">
          <i class="fa-solid fa-lock"></i>
          <p class="subtitulo_azul">Seguridad Total</p>
          <p>
            Perfiles para
            <span class="negritas"
              >controlar accesos y resguardar tu información.</span
            >
            Tus datos siempre estarán seguros con nuestro equipo de trabajo.
          </p>
        </article>
        <article class="iconorequerimiento">
          <i class="fa-solid fa-tty"></i>
          <p class="subtitulo_azul">Plataforma de Contacto</p>
          <p>
            Tendrás a tu disposición
            <span class="negritas">una plataforma de contacto</span>, con el
            cual podras estar en contacto con otros usuarios y expertos de
            ManagementPro.
          </p>
        </article>
      </div>
    </section>
    <section class="ancho como_funciona">
      <h2 class="subtitulo_azul">Cómo funciona</h2>
      <div class="etapas">
        <article>
          <div class="circulo">
            <p>1</p>
          </div>
          <p>
            Elige el curso y ve un paso más allá para lograr tu objetivo de
            aprendizaje.
          </p>
        </article>
        <article>
          <div class="circulo">
            <p>2</p>
          </div>
          <p>
            Adquiere nuevas competencias con videotutoriales de corta duración.
          </p>
        </article>
        <article>
          <div class="circulo">
            <p>3</p>
          </div>
          <p>
            Una vez capacitándose podrás tener un gran habilidad para usar el
            punto de venta sin ningún problema.
          </p>
        </article>
      </div>
    </section>
    <section class="section-acordeon ancho">
      <h2 class="subtitulo_azul">Preguntas frecuentes</h2>
      <div class="content-acordeon">
        <div class="doble">
          <div id="acordeon" class="acordeon">
            <div class="acordeon-titulo">
              <h3>¿Para qué me servirá este curso?</h3>
              <i id="icono" class="mas fas fa-plus-square"></i>
            </div>
            <article class="informacion">
              <p>
                En este curso aprenderás a configurar y usar el mejor punto de
                venta de ManagementPro que tenemos para tu negocio.
              </p>
            </article>
          </div>
          <div id="acordeon" class="acordeon">
            <div class="acordeon-titulo">
              <h3>¿En qué idioma se imparten los cursos?</h3>
              <i id="icono" class="mas fas fa-plus-square"></i>
            </div>
            <article class="informacion">
              <p>Todos los cursos de ManagementPro se imparten en español.</p>
            </article>
          </div>
          <div id="acordeon" class="acordeon">
            <div class="acordeon-titulo">
              <h3>¿Qué aplicación de software se usará en el curso?</h3>
              <i id="icono" class="mas fas fa-plus-square"></i>
            </div>
            <article class="informacion">
              <p>
                Se usará como software nuestro sistema de punto de venta
                ManagementPro | RETAIL donde se explicara paso a paso todos los
                módulos necesarios con el cual cuenta para que puedas configurar
                tu negocio.
              </p>
            </article>
          </div>
        </div>
        <div class="doble">
          <div id="acordeon" class="acordeon">
            <div class="acordeon-titulo">
              <h3>¿Debo tener una cuenta para tomar el curso?</h3>
              <i id="icono" class="mas fas fa-plus-square"></i>
            </div>
            <article class="informacion">
              <p>
                Sí, es necesario tener una cuenta en
                <span class="negritas">community</span> para que nuestro equipo
                de trabajo sepa que tipo de usuario eres y puedan darte acceso a
                nuestro sitio web de capacitación.
              </p>
            </article>
          </div>
          <div id="acordeon" class="acordeon">
            <div class="acordeon-titulo">
              <h3>¿A quién puedo dirigirme en caso de duda o problema?</h3>
              <i id="icono" class="mas fas fa-plus-square"></i>
            </div>
            <article class="informacion">
              <p>
                Para resolver todas tus dudas podrás contactar a nuestro equipo
                de trabajo, para ello podrás dirigirte en la sección de
                contacto, el cual encontraras toda la información necesaria.
              </p>
            </article>
          </div>
          <div id="acordeon" class="acordeon">
            <div class="acordeon-titulo">
              <h3>¿Qué computadora necesito?</h3>
              <i id="icono" class="mas fas fa-plus-square"></i>
            </div>
            <article class="informacion">
              <p>
                Si ya cuentas con una computadora, estos son los requisitos
                mínimos que debe tener para que puedas instalar nuestro sistema
                punto de venta ManagementPro | RETAIL.
              </p>
              <div class="requisitos">
                <p class="negritas">Características del curso</p>
                <p>
                  <i class="tamañoicono fa-solid fa-microchip"></i>Procesador:
                  2.0 G hz.
                </p>
                <p>
                  <i class="tamañoicono fa-solid fa-memory"></i>Memoria RAM: 4
                  Gb
                </p>
                <p>
                  <i class="tamañoicono fa-solid fa-hard-drive"></i>Disco Duro:
                  500 GB
                </p>
                <p>
                  <i class="tamañoicono fa-brands fa-windows"></i>Sistema
                  Operativo: Windows 10 en adelante
                </p>
              </div>
            </article>
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
  </body>
</html>
