<?php
    session_start();
    include ("../../../inc/conexion.php");
    $usuario = $_SESSION['nombre'];
    if (!isset($usuario)){
      header("location:index.php");
    }
    // generar la consulta para extraer los datos
    $id = $_POST['Cr_Cve_Curso'];
    $m = "SELECT * FROM Curso WHERE Cr_Cve_Curso = '$id'";
    $modificar = $conn->query($m);
    $dato = $modificar->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Modificar curso';
        $page_base = '../../../';
        include ("../../../inc/base/head.php");
    ?>
  </head>
  <body>
    <?php 
        $page_base = '../../../';
        include ("../../../inc/base/header.php");
    ?>
    <section class="cursos">
      <div class="contenedoregistro">
        <div class="contenedorvideo">
          <div class="titulovideo">
            <h3>NUEVA SECCIÓN DE CAPACITACIÓN</h3>
          </div>
        </div>
        <div class="contenedor_info_centro">
          <!-- Comienza el metodo POST -->
          <form id="FormRegistro" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <!-- Añadipo por mi -->
            <input class="elementos" type="text" name="mtitulo" id="titulo" value="<?php echo['Cr_Titulo']; ?>" placeholder="Título" required/>
            <input class="elementos" type="text" name="msubtitulo" id="subtitulo" value="<?php echo['Cr_Subtitulo']; ?>" placeholder="Subtítulo" required/>
            <input class="elementos" type="text" name="mdescripcion" id="descripcion" value="<?php echo['Cr_Descripcion']; ?>" placeholder="Descripción" required/>
            <!-- Cambiado para que me permitiera registrar -->
            <div class="opciones">
            <button type="submit" class="btn_ingresar" name="registrarVideo">Modificar</button>
            <button type="submit" class="btn_ingresar" name="cancelarVideo"  onClick="history.go(-1);">Cancelar</button>
            <!-- <input type="button" value="Página anterior" onClick="history.go(-1);"> -->
            </div>
          </form>
          <p id="MessageText" class="messagebox <?php echo ($_SESSION['error']!='')?'error':''; ?>"><?php echo $_SESSION['error']; ?></p>
        </div>
      </div>
    </section>
    <script>

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
                    $('.messagebox').html(data.substring(3));
                    $('.messagebox').addClass('messagebox_info');    
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