<?php 
  session_start();
  include ("../../inc/conexion.php");
  $base_page = '../../';

  $idCurso = trim(isset($_GET['id'])?$_GET['id']:'');
  $idUsuario = (isset($_SESSION['usuario']))?$_SESSION['usuario']:'';
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
    <!-- <link href="pace-master/themes/red/pace-theme-center-atom.css" rel="stylesheet" />
    <script src="pace-master/pace.min.js"></script> -->
    <script
      src="https://kit.fontawesome.com/2ee0245f3d.js"
      crossorigin="anonymous"
    ></script>
    <script src="<?php echo $base_page; ?>js/wow.min.js"></script>
  </head>
  <body>
    <?php
        $page_base = '../../';
        include "../../inc/base/header-white.php";

        $query="SELECT * FROM Curso WHERE Cr_Cve_Curso = '$idCurso'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $iTitulo = $row['Cr_Subtitulo'];
        mysqli_free_result($result);
        
        $query="SELECT * FROM Curso_Video WHERE Cr_Cve_Curso = '$idCurso'";
        $result = mysqli_query($conn, $query);
        $numClases = mysqli_num_rows($result);
        ?>
    <!-- <input type="button" value="refresh" onclick="location.reload();"> -->
    <div class="division ancho">
      <div class="playlist">
        <h2 class="subtitulo_azul" id="txtTitulo"><?php echo $iTitulo; ?></h2>
        <div class="tiempo">
        <div class="check">
          <i class="tamañoicono fa-solid fa-circle-play"></i>
          <p><?php echo $numClases; ?> clases</p>
        </div>
        <div class="check">
          <i class="tamañoicono fa-regular fa-clock"></i>
          <p>2hrs. 45min</p>
        </div>
        </div>
        <hr />
        <div class="menutabs">
        <?php 
        $idCursoV = '';
        $iVideo = '';
        $iDescripcion = '';
        $iTitulo = '';

        $iRow = 0;
        while ($row = mysqli_fetch_assoc($result)){
            $iRow+=1;
            if($iRow==1){
                $idCursoV = $row['Cv_Cve_Curso_Video'];
                $iVideo = $row['Cv_Url'];
                $iTitulo = $row['Cv_Titulo'];
                $iDescripcion = $row['Cv_Descripcion'];
            }

            $IdYoutube = Get_Youtube_Id($row['Cv_Url']);

        ?>
            <div class="check-video">
                <a 
                    href="#op1" 
                    onclick="LoadVideoId('<?php echo $row['Cv_Cve_Curso_Video']; ?>')" 
                    id="cv<?php echo $row['Cv_Cve_Curso_Video']; ?>" 
                    class="link" 
                    cv-titulo="<?php echo $row['Cv_Titulo']; ?>" 
                    cv-descripcion="<?php echo $row['Cv_Descripcion']; ?>" 
                    cv-url="<?php echo $row['Cv_Url']; ?>"
                    cv-id-youtube="<?php echo $IdYoutube; ?>">
                    <i class="tamañoicono fa-solid fa-circle-play"></i>
                    <?php echo $row['Cv_Cve_Curso_Video']; ?>. <?php echo $row['Cv_Titulo']; ?>
                </a>
            </div>

          <!-- <div id="player"></div>
          <script>
            videoId = 'someVideoId';
            var tag = document.createElement('script');
            tag.src = "//www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
          </script> -->
        <?php 
        }
        mysqli_free_result($result);
        ?>
        </div>
      </div>
      <section id="contenedor_tabs">
        <article id="op1">
          <div id="ContainerYT">
            <div id="player"></div>
          </div>
          <div class="descripcion">
            <p class="negritas">Descripción</p>
            <hr />
            <p id="txtDescripcion"><?php echo $iDescripcion; ?></p>
          </div>
        </article>
      </section>
    </div>
    
    <footer>
      <div id="contenidofooter" class="ancho">
        <a href="<?php echo $page_base ?>">
          <figure>
            <img src="<?php echo $page_base ?>imagenes/logo_gris.png" alt="" />
          </figure>
        </a>
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
    <script src="../../funciones.js"></script>
    <script type="text/javascript">
      
      function LoadVideo(id){
          //Traemos los datos
          var titulo, descripcion, url;
          titulo = $('#cv'+id).attr('cv-titulo');
          descripcion = $('#cv'+id).attr('cv-descripcion');
          url = $('#cv'+id).attr('cv-url');
          
          $('#txtTitulo').html(titulo);
          $('#txtDescripcion').html(descripcion);
          $('#txtUrl').attr('src',url);
      }

    </script>
    <div id="YoutubeScript"></div>
    <script>
      var tag = document.createElement('script');
      var ejecutado = false;
      var iniciado;
      var avance;

      //tag.src = "https://www.youtube.com/iframe_api";
      tag.src = '//www.youtube.com/player_api';
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      
      function onPlayerReady(event) {
        changeState();
      }
      
      function changeState(){
        
        if (typeof player.getPlayerState != 'function') {
          return;
        }
        
        //State 1: Video en reproduccion
        if (player.getPlayerState()== 1 ){
          
          //Si no esta activo los intervalos, los activamos
          if (!ejecutado){
            iniciado = setInterval(updatetime,5000);
            ejecutado = true;
          }
        }
        
        if (player.getPlayerState() == 0 || player.getPlayerState() == 2 ){
          if(ejecutado){
            clearInterval(iniciado);
            ejecutado = false;
          }
        }
        
        if (player.getPlayerState() == 0 ){
          //console.log('fin-'+ player.getDuration());
          updatetime();
        }
      };
      
      function updatetime(){
        
        $.ajax({
          type: "POST",
          url: "./action/save.php",
          timeout: 5000,
          data: {
            Curso: '<?php echo $idCurso; ?>',
            Video: '<?php echo $idCursoV; ?>',
            Duracion: player.getDuration(),
            Segundos: player.getCurrentTime()
          },
          success: function(data){
            //console.log(player.getDuration() + ' - ' + player.getCurrentTime());
            console.log(data);
          },
          error: function(a,b,c){
            console.log('err: ' + c);
          }
        });
      }

      function LoadVideoId(id){
        idVideo = $('#cv'+id).attr('cv-id-youtube');

        $.ajax({
          type:'POST',
          url:'./action/load.php',
          data:{
            idYoutube:idVideo
          },
          success:function(data){
            $('#ContainerYT').html(data);
          },error:function(a,b,c){
            console.log(c);
          }
        });
      }

      $(document).ready(function(){
        LoadVideoId('<?php echo $idCursoV; ?>');
      });
    </script>
  </body>
</html>
