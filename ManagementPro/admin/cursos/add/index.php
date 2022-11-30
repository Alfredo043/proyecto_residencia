<?php
    session_start();
    include ("../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']==''){
      header('Location: ../../../');
      exit();
    }

    // generar la consulta para extraer los datos
    $idCurso = trim(isset($_GET['id'])?$_GET['id']:'');
    $TipoUsuario = trim(isset($_GET['id'])?$_GET['id']:'');

    $bNuevo = true;
    
    $cr_titulo = '';
    $cr_subtitulo = '';
    $cr_descripcion = '';

    if($idCurso!=''){
      $query = "SELECT * FROM Curso WHERE Cr_Cve_Curso = '$idCurso'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result)){
        //Existe el curso asi que lo buscamos
        $row = mysqli_fetch_array($result);

        $cr_titulo = $row['Cr_Titulo'];
        $cr_subtitulo = $row['Cr_Subtitulo'];
        $cr_descripcion = $row['Cr_Descripcion'];
        $bNuevo = false;
      }else{
        $idCurso = '';
      }

      $result->close();
    }

    if($bNuevo){
      $tituloForm = 'Agregar nuevo curso';
    }else{
      $tituloForm = 'Editar curso: '.$idCurso;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Registro de curso';
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
            <h3><?php echo $tituloForm ?></h3>
          </div>
        </div>
        <div class="contenedor_info_centro">
          <!-- Comienza el metodo POST -->
          <form id="FormRegistro" method="POST" action="javascript:sendForm()">
            <input type="hidden" name="Cr_Cve_Curso" id="Cr_Cve_Curso" value="<?php echo $idCurso ?>" />
            <input type="hidden" name="Tu_Cve_Tipo_Usuario" id="Tu_Cve_Tipo_Usuario" value="<?php echo $TipoUsuario ?>" />
            <!-- Añadipo por mi -->
            <input class="elementos" type="text" name="Cr_Titulo" id="Cr_Titulo" placeholder="Escribe el título" value="<?php echo $cr_titulo ?>" required/>
            <input class="elementos" type="text" name="Cr_Subtitulo" id="Cr_Subtitulo" placeholder="Escribe el subtítulo" value="<?php echo $cr_subtitulo ?>" required/>
            <textarea class="elementos" rows="3" name="Cr_Descripcion" id="Cr_Descripcion" placeholder="Escribe la descripción"><?php echo $cr_descripcion ?></textarea>

            
            <div class="elementoslabel">
            <label for="" class="">Seleciona los tipos de usuario</label>
            <?php 
              $query = "";
              $query .= "SELECT Tu_Cve_Tipo_Usuario as Clave, Tu_Descripcion as Descripcion ";
              $query .= "FROM Tipo_Usuario WHERE Es_Cve_Estado = 'AC' ";
              $result = mysqli_query($conn, $query);

              if(mysqli_num_rows($result)){
                //Existe el curso asi que lo buscamos
                while($row = mysqli_fetch_array($result)){
                  ?>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="TipoUsuario_<?php echo $row['Clave']?>" name="TipoUsuario" value="<?php echo $row['Clave']?>">
                    <label class="form-check-label" for="TipoUsuario_<?php echo $row['Clave']?>">
                      <?php echo $row['Descripcion'];?>
                    </label>
                  </div>
                  <?php 
                }
              }
              $result->close();
            ?>
            </div>
            <!-- Cambiado para que me permitiera registrar -->
            <div class="opciones">
            <button type="submit" class="btn_ingresar" name="btnAdd"><?php echo ($bNuevo)?'Agregar':'Guardar'; ?></button>
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
        var tipo = '';
        $('input[name="TipoUsuario"]:checked').each( function(index) {
          // your code here
            if(tipo!='') tipo+=',';
            tipo+=$(this).val();
        });

        $('[name="Tu_Cve_Tipo_Usuario"]').val(tipo);
        var datos = $('#FormRegistro').serialize();
        console.log(datos);
        
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
                  window.location.href='../';
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