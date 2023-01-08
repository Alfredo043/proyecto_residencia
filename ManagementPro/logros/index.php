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
      $page_base = '../';
      include "../inc/base/header-white.php";
    ?>
    <!-- <input type="button" value="refresh" onclick="location.reload();"> -->
    <section class="ancho logros" style="text-align: -webkit-left;">
    
      <div class="contenido_left">
        <h2 class="titulo">Mis logros</h2>
        <h3>
          <span class="negritas">Avance de capacitaciones</span>
        </h3>
      </div>
      <div class="modulos">
      <?php 
          try{
            $usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:'0';

            $query = "";
            $query .= "SELECT Cr.Cr_Cve_Curso, Cr.Cr_Titulo, Cr.Cr_Subtitulo, Cr.Cr_Descripcion, IFNULL(Cv.Cv_Tiempo,0) as Total, IFNULL(Cuv.Cuv_Tiempo,0) as Avance ";
            $query .= "FROM Curso_Usuario Cu ";
            $query .= "    INNER JOIN Curso Cr ON Cu.Cr_Cve_Curso = Cr.Cr_Cve_Curso ";
            $query .= "    LEFT JOIN (SELECT Cr_Cve_Curso, SUM(Cv_Tiempo) as Cv_Tiempo FROM Curso_Video GROUP BY Cr_Cve_Curso) Cv ON Cv.Cr_Cve_Curso = Cr.Cr_Cve_Curso ";
            $query .= "    LEFT JOIN (SELECT Cr_Cve_Curso, Us_Cve_Usuario, SUM(Cuv_Tiempo) as Cuv_Tiempo FROM Curso_Usuario_Video GROUP BY Cr_Cve_Curso, Us_Cve_Usuario) Cuv ON Cuv.Cr_Cve_Curso = Cu.Cr_Cve_Curso AND Cuv.Us_Cve_Usuario = Cu.Us_Cve_Usuario ";
            $query .= "WHERE Cu.Us_Cve_Usuario = '$usuario' ";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){
                $total = floatval($row['Total']);
                $avance = floatval($row['Avance']);
                $porcentaje = 0;

                if($total>0){
                    $porcentaje = intval((100 / $total) * $avance);
                }
                ?>
                <article id="curso<?php echo $row['Cr_Cve_Curso']; ?>" class="etapa">
                    <div class="circlePercent">
                        <div class="counter" data-percent="<?php echo $porcentaje ?>" value="<?php echo $porcentaje ?>"></div>
                        <div class="progress"></div>
                        <div class="progressEnd"></div>
                    </div>
                    <br>
                    <h2 class="subtitulo_naranja" href="./studio/?id=<?php echo $row['Cr_Cve_Curso']; ?>"><?php echo $row['Cr_Titulo']; ?></h2>
                </article>
                <?php 
            }

            mysqli_free_result($result);

          }catch(Exception $e){
            echo 'Error: '.$e->getMessage(); 
          }
        ?>
      </div>
    </section>
    <br><br>
    <?php
      include "../footer.php";
    ?>
    <!-- SCRIPT FUNCIONES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../funciones.js"></script>
    <script>
    function setProgress(elem, percent) {
        
        var degrees = percent * 3.6, transform = /MSIE 9/.test(navigator.userAgent)?"msTransform":"transform";
        var progEnd = $(elem).find('.progressEnd');
        var progress = $(elem).find('.progress');

        $(progEnd).css('transform',"rotate(" + degrees + "deg)");
        $(progress).css('transform',"rotate(" + degrees + "deg)");
    }

    (function () {
        var elem = $('.circlePercent');
        $(elem).each(function(index){
            var contador = $(this).find('.counter');
            var porcentaje = 0;
            if(contador!==undefined){
                porcentaje = $(contador).attr('data-percent');
            }
            setProgress($(this), (porcentaje));
        });
    })();
  </script>
  </body>
</html>
