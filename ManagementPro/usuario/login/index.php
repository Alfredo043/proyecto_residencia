<?php
    session_start();
    include ("../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']!=''){
      //Si ya esta logueado se redirige al inicio
      header('Location: ../../');
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Iniciar sesión';
        $page_base = '../../';
        include ("../../inc/base/head.php");
    ?>
  </head>
  <body>
    <section class="slidefoto">
      <div class="contenedorlogin">
        <div class="contenedorlogotipo">
          <figure>
            <img src="../../imagenes/logo_gris.png" alt="" />
          </figure>
        </div>
        <div class="contenedor_info_centro">
            <!-- Comienza el metodo POST -->
            <form id="FormRegistro" method="POST" action="javascript:sendForm()">
                <!-- Añadipo por mi -->
                <input class="elementos" type="text" name="email" id="email" placeholder="Correo electrónico" required/>
                <input class="elementos" type="password" name="password" id="password" placeholder="Contraseña" required/>
                <div class="recordar">
                    <input type="checkbox" id="show_password" name="show_password" onchange="changeCheckPass(this)" />
                    <label for="show_password">Mostrar Contraseña</label><br />
                </div>
                <!-- Cambiado para que me permitiera registrar -->
                <button type="submit" class="btn_ingresar" name="iniciarSesion">Iniciar sesión</button>
            </form>
            <p>¿No tienes una cuenta? <a href="../registro/" class="gradient-text">Crear cuenta</a></p>
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
            url:'./action/save.php',
            data:datos,
            success:function(data){
                //Se habilitan las cajas de texto y botones
                $('.btn_ingresar').prop('disabled',false);
                $('.elementos').prop('readonly',false);
                //Se asigna un mensaje de informacion
                if(data.substring(0,2)=='OK'){
                  window.location.href='../../';
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