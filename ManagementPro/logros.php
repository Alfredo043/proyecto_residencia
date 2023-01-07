<?php 
  session_start();
  include ("inc/conexion.php");
  $base_page = '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="google" value="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal de capacitación ManagementPro</title>
    <link rel="icon" type="image/png" href="<?php echo $base_page; ?>imagenes/fondo_curso.jpg" />
    <link rel="stylesheet" href="<?php echo $base_page; ?>css/site.css" />
    <link rel="stylesheet" href="<?php echo $base_page; ?>movil.css" />
    <link rel="stylesheet" href="<?php echo $base_page; ?>ipad.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <!-- <link href="pace-master/themes/red/pace-theme-material.css" rel="stylesheet" />
    <script src="pace-master/pace.min.js"></script> -->

    <script
      src="https://kit.fontawesome.com/2ee0245f3d.js"
      crossorigin="anonymous"
    ></script>
    <script src="<?php echo $base_page; ?>js/wow.min.js"></script>
  </head>
  <body>
    <?php
      $page_base = './';
      include "./inc/base/header-white.php";
    ?>
    <!-- <input type="button" value="refresh" onclick="location.reload();"> -->
    <section class="ancho logros" style="text-align: -webkit-left;">
    
      <div class="contenido_left">
        <h2 class="titulo">ManagementPro | Retail</h2>
        <h3>
          <span class="negritas">Mis logros</span>
        </h3>
      </div>
      <div class="modulos">
      <?php 
          try{
              $tipo = isset($_SESSION['tipo'])?$_SESSION['tipo']:0;

              $query = "";
              $query .= "SELECT * ";
              $query .= "FROM Curso ";
              $query .= "WHERE Es_Cve_Estado <> 'BA' AND ";
              $query .= " Cr_Cve_Curso IN (SELECT Cr_Cve_Curso FROM Curso_Tipo_Usuario WHERE Tu_Cve_Tipo_Usuario = '$tipo' )";
              $result = mysqli_query($conn, $query);
            }catch(Exception $e){
              echo 'Error: '.$e->getMessage(); 
            }
        ?>
        <?php
          while($row = mysqli_fetch_array($result)){
        ?>
        <article id="curso<?php echo $row['Cr_Cve_Curso']; ?>" class="etapa">
        <div class="circlePercent">
        <?php 
          try{
              $query = "";
              $query .= "SELECT Cr_Cve_Curso, SUM(Cv_Tiempo)";
              $query .= "FROM Curso_Video ";
              $query .= "GROUP BY Cr_Cve_Curso ";
              $result = mysqli_query($conn, $query);
            }catch(Exception $e){
              echo 'Error: '.$e->getMessage(); 
            }
        ?>
        <?php
          while($row = mysqli_fetch_array($result)){
        ?>
         <?php 
          try{
              $query = "";
              $query .= "SELECT Cr_Cve_Curso, Cr_Cve_Usuario, SUM(Cuv_Tiempo)";
              $query .= "FROM Curso_Usuario_Video ";
              $query .= "GROUP BY Cr_Cve_Curso, Us_Cve_Usuario ";
              $result = mysqli_query($conn, $query);
            }catch(Exception $e){
              echo 'Error: '.$e->getMessage(); 
            }
        ?>
        <?php
          while($row = mysqli_fetch_array($result)){
        ?>
          <div class="counter" data-percent="0" value="obtenerPorcentaje"></div>
          <div class="progress"></div>
          <div class="progressEnd"></div>
        </div>
          <!-- <div role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="--value:65"></div> -->
          <br>
          <h2 class="subtitulo_naranja" href="./studio/?id=<?php echo $row['Cr_Cve_Curso']; ?>"><?php echo $row['Cr_Titulo']; ?></h2>
          <?php
          }

          mysqli_free_result($result);
        ?>
          <?php
          }

          mysqli_free_result($result);
        ?>
        </article>
        <?php
          }

          mysqli_free_result($result);
        ?>
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

    <script>
      function obtenerPorcentaje(Cuv_Tiempo) {
          $total = (float)$row['Cv_Tiempo']; // Obtener total de la base de datos
          $porcentaje = ((float)Cuv_Tiempo * 100) / $total; // Regla de tres
          $porcentaje = round($porcentaje, 0);  // Quitar los decimales
          return $porcentaje;
      }
    </script>

    <!-- <script>
    function setProgress(elem, percent) {
      var degrees = percent * 3.6,
        transform = /MSIE 9/.test(navigator.userAgent)
          ? "msTransform"
          : "transform";
      elem
        .querySelector(".counter")
        .setAttribute("data-percent", Math.round(percent));
      elem.querySelector(".progressEnd").style[transform] =
        "rotate(" + degrees + "deg)";
      elem.querySelector(".progress").style[transform] =
        "rotate(" + degrees + "deg)";
      if (percent >= 50 && !/(^|\s)fiftyPlus(\s|$)/.test(elem.className))
        elem.className += " fiftyPlus";
    }

    (function () {
      var elem = document.querySelector(".circlePercent"),
        percent = 0;
      (function animate() {
        setProgress(elem, (percent += 0.25));
        if (percent < 100) setTimeout(animate, 15);
      })();
    })();
  </script> -->
  </body>
</html>
