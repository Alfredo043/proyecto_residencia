<?php
    session_start();
    include ("../../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']==''){
      header('Location: ../../../../');
      exit();
    }

    // generar la consulta para extraer los datos
    $idVideo = trim(isset($_GET['id'])?$_GET['id']:'');
    $idCurso = trim(isset($_GET['cr'])?$_GET['cr']:'');

    if($idCurso==''){
      $SESSION['error'] = 'No se encontro el curso actual';
      header('Location: ../');
      exit();
    }

    $bNuevo = true;
    
    $cv_titulo = '';
    $cv_url = '';
    $cv_descripcion = '';

    if($idVideo!=''){
      $query = "SELECT * FROM Curso_Video WHERE Cv_Cve_Curso_Video = '$idVideo'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result)){
        //Existe el curso asi que lo buscamos
        $row = mysqli_fetch_array($result);

        $cv_titulo = $row['Cv_Titulo'];
        $cv_url = $row['Cv_Url'];
        $cv_descripcion = $row['Cv_Descripcion'];
        $bNuevo = false;
      }else{
        $idVideo = '';
      }

      $result->close();
    }

    if($bNuevo){
      $tituloForm = 'Agregar nuevo video';
    }else{
      $tituloForm = 'Editar video: '.$idVideo;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Registro de video';
        $page_base = '../../../../';
        include ("../../../../inc/base/head.php");
    ?>
  </head>
  <body>
    <?php 
        $page_base = '../../../../';
        include ("../../../../inc/base/header.php");
    ?>
    <section class="cursos">
      <div class="contenedoregistro">
        <div class="contenedorvideo">
          <div class="titulovideo">
            <h3><?php echo $tituloForm ?></h3>
          </div>
        </div>
        <div class="contenedor_info_centro">
          <!-- Comienza el metodo POST -->
          <form id="FormRegistro" method="POST" action="javascript:sendForm()">
            <input type="hidden" name="Cv_Cve_Curso_Video" id="Cv_Cve_Curso_Video" value="<?php echo $idVideo ?>" />
            <input type="hidden" name="Cr_Cve_Curso" id="Cr_Cve_Curso" value="<?php echo $idCurso ?>" />
            <!-- Añadipo por mi -->
            <input class="elementos" type="text" name="Cv_Titulo" id="Cv_Titulo" placeholder="Escribe el título" value="<?php echo $cv_titulo ?>" required/>
            <input class="elementos" type="text" name="Cv_Url" id="Cv_Url" placeholder="Pega el enlace del video" value="<?php echo $cv_url ?>" required/>
            <textarea class="elementos" rows="3" name="Cv_Descripcion" id="Cv_Descripcion" placeholder="Escribe la descripción"><?php echo $cv_descripcion ?></textarea>
            <!-- Cambiado para que me permitiera registrar -->
            <div class="opciones">
            <button type="submit" class="btn_ingresar" name="btnAdd"><?php echo ($bNuevo)?'Agregar':'Editar'; ?></button>
            <button type="button" class="btn_ingresar" name="btnCancel"  onClick="pageBack()">Cancelar</button>
            </div>
          </form>
          <p id="MessageText" class="messagebox <?php echo ($_SESSION['error']!='')?'error':''; ?>"><?php echo $_SESSION['error']; ?></p>
        </div>
      </div>
    </section>
    <script>
      function pageBack(){
        window.location.href='../';
      }

      function sendForm(){
        var datos = $('#FormRegistro').serialize();

        //Se deshabilitan las cajas de texto y botones
        $('.btn_ingresar').prop('disabled',true);
        $('.elementos').prop('readonly',true);

        //Se quita el mensaje si tiene informacion
        $('.messagebox').removeClass('messagebox_error');
        $('.messagebox').removeClass('messagebox_info');

        $.ajax({
            type:'POST',
            url:'./action/save.php',
            data:datos,
            success:function(data){
                //Se habilitan las cajas de texto y botones
                $('.btn_ingresar').prop('disabled',false);
                $('.elementos').prop('readonly',false);
                //Se asigna un mensaje de informacion
                if(data.substring(0,2)=='OK'){
                  window.location.href='../?id=<?php echo $idCurso; ?>';
                    //$('.messagebox').html(data.substring(3));
                    //$('.messagebox').addClass('messagebox_info');    
                }else{
                    $('.messagebox').html(data);
                    $('.messagebox').addClass('messagebox_error');
                }
            },error:function(a,b,c){
                //Se habilitan las cajas de texto y botones
                $('.btn_ingresar').prop('disabled',false);
                $('.elementos').prop('readonly',false);
                //Se asigna un mensaje de error
                $('.messagebox').html(c);
                $('.messagebox').addClass('messagebox_error');
            }
        });
      }
    </script>
  </body>
</html>