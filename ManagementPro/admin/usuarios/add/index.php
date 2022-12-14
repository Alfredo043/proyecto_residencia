<?php
    session_start();
    include ("../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']==''){
      header('Location: ../../../');
      exit();
    }

    // generar la consulta para extraer los datos
    $idUser = trim(isset($_GET['id'])?$_GET['id']:'');

    $bNuevo = true;
    
    $us_descripcion = '';
    $tu_cve_tipo_usuario = 0;

    if($idUser!=''){
      // $query = "SELECT * FROM Usuario WHERE Us_Cve_Usuario = '$idUser'";
      $query = "";
      $query .= "SELECT Us_Cve_Usuario, ";
      $query .= " Usuario.Tu_Cve_Tipo_Usuario, ";
      $query .= " Us_Descripcion ";
      $query .= "FROM Usuario ";
      $query .= " INNER JOIN Tipo_Usuario Tu ON Tu.Tu_Cve_Tipo_Usuario = Usuario.Tu_Cve_Tipo_Usuario ";
      $query .= "WHERE Us_Cve_Usuario = '$idUser' ";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result)){
        //Existe el curso asi que lo buscamos
        $row = mysqli_fetch_array($result);

        $us_descripcion = $row['Us_Descripcion'];
        $tu_cve_tipo_usuario = $row['Tu_Cve_Tipo_Usuario'];
        $bNuevo = false;
      }else{
        $idUser = '';
      }

      $result->close();
    }

    if($bNuevo){
      $tituloForm = 'Agregar nuevo curso';
    }else{
      $tituloForm = 'Editar usuario: '.$idUser;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Registro de usuario';
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
            <input type="hidden" name="Us_Cve_Usuario" id="Us_Cve_Usuario" value="<?php echo $idUser ?>" />
            <!-- A??adipo por mi -->
            <input class="elementos" type="text" name="Us_Descripcion" id="Us_Descripcion" placeholder="Escribe el nombre" value="<?php echo $us_descripcion ?>" required/>
            <!-- <input class="elementos" type="text" name="Tu_Descripcion" id="Tu_Descripcion" placeholder="Escribe el tipo de usuario" value="<?php echo $tu_descripcion ?>" required/> -->
            <select class="elementos" name="Tu_Cve_Tipo_Usuario" id="Tu_Cve_Tipo_Usuario">
              <option value="" <?php echo ($tu_cve_tipo_usuario=='')?'selected':''; ?>>Seleciona un tipo</option>
              <?php 
              $query = "";
              $query .= "SELECT Tu_Cve_Tipo_Usuario as Clave, Tu_Descripcion as Descripcion ";
              $query .= "FROM Tipo_Usuario WHERE Es_Cve_Estado = 'AC' ";
              $result = mysqli_query($conn, $query);

              if(mysqli_num_rows($result)){
                //Existe el curso asi que lo buscamos
                while($row = mysqli_fetch_array($result)){
                  ?>
                  <option value="<?php echo $row['Clave'] ?>" <?php echo ($row['Clave']==$tu_cve_tipo_usuario)?'selected':''; ?>>
                    <?php echo $row['Descripcion'] ?>
                  </option>
                  <?php 
                }
              }
              $result->close();
            ?>
            </select>
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