<?php 
  session_start();
  include ("../inc/conexion.php");
  $base_page = '../';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/2ee0245f3d.js"
      crossorigin="anonymous"
    ></script>
    <script src="<?php echo $base_page; ?>js/wow.min.js"></script>
    <style>
      #menu_fixed {
        height: 182px;
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
      $page_base = '../';
      include "../inc/base/header-white.php";
    ?>
    <section class="ancho capacitacion">
      <!-- <br> -->
      <div class="contenido_centrado">
        <h2 class="titulo">Portal Capacitación ManagementPro</h2>
        <p>
          Material preparado exclusivamente para ti y tu negocio te invitamos, a
          capacitarte en nuestro mejor software y así poder obtener lo mejor de
          su punto de venta ManagementPro (Retail) ¡Disfrútalo!
        </p>
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
          <h2 class="subtitulo_naranja" href="./studio/?id=<?php echo $row['Cr_Cve_Curso']; ?>"><?php echo $row['Cr_Titulo']; ?></h2>
          <br />
          <div class="comenzar">
            <p>"<?php echo $row['Cr_Subtitulo']; ?>"</p>
            <a href="./studio/?id=<?php echo $row['Cr_Cve_Curso']; ?>" id="btn_naranja"> Comenzar</a>
          </div>
        </article>
        <?php
          }

          mysqli_free_result($result);
        ?>
      </div>
    </section>
    <?php
      $page_base = '../';
      include "../footer.php";
    ?>
    <!-- SCRIPT FUNCIONES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $base_page; ?>funciones.js"></script>

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
