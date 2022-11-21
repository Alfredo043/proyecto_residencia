<?php
    session_start();
    include ("../../inc/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Cuenta de usuario';
        $page_base = '../../';
        include ("../../inc/base/head.php");
    ?>
  </head>
  <body>
    <?php 
        $page_base = '../../';
        include ("../../inc/base/header.php");
    ?>
    <section class="cursos">
      <div class="contenedoregistro">
        <div class="contenedorlogotipo">
          <figure>
            <img src="../../imagenes/logo_gris.png" alt="" />
          </figure>
        </div>
        <div class="contenedor_cuenta">
            <!-- Comienza el metodo POST -->
            <center>
              <br>
              <h5>"BIENVENIDO"</h5><br>
              <h5><b>Nombre: </b><?php echo $_SESSION['nombre']; ?></h5><br>
              <h5><b>Correo: </b><?php echo $_SESSION['email']; ?></h5>
            </center>
            <br>
            <hr />
            <div class="ancho" id="copy">
              <p>
                &copy; 2022 | ManagementPro Inc | 12 South 1st. Street Ste. 1100, <br> San
                José, CA, 95113
              </p>
            </div>
            <p id="MessageText" class="messagebox <?php echo ($_SESSION['error']!='')?'error':''; ?>"><?php echo $_SESSION['error']; ?></p>
        </div>
      </div>
    </section>
    <script>
      function changeCheckPass() {
        var tipo = document.getElementById("password");
        tipo.type = (tipo.type == "password")?"text":"password";
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
            url:'./action/update.php',
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