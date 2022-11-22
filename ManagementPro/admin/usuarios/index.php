<?php
    session_start();
    include ("../../inc/conexion.php");

    $baseuriseg = '../../';
    include ("../../inc/segurity.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        $page_title = 'Lista de usuarios';
        $page_base = '../../';
        include ("../../inc/base/head.php");
    ?>
  </head>
  <body>
    <?php 
    include ("../../inc/base/header.php");
    ?>
    <section class="container" style="padding-top:60px;">
      <div class="row">
        <div class="col-12 mt-3">
          <figure>
            <img src="../../imagenes/logo_azul.png" alt="" />
          </figure>
        </div>
        <div class="col-12 pt-2 pb-2">
          <span class="pull-start">Bienvenido <b><?php echo $_SESSION['nombre']; ?></b></span>
          
        </div>
        <div class="col-12">
            <?php
            try{
              $query = "";
                $query .= "SELECT Us_Cve_Usuario as Clave, ";
                $query .= " Tu_Descripcion as Tipo, ";
                $query .= " Us_Descripcion as Nombre, ";
                $query .= " Us_Email as Email, ";
                $query .= " Usuario.Es_Cve_Estado as Estado ";
                $query .= "FROM Usuario ";
                $query .= " INNER JOIN Tipo_Usuario Tu ON Tu.Tu_Cve_Tipo_Usuario = Usuario.Tu_Cve_Tipo_Usuario ";
                $query .= "WHERE Usuario.Es_Cve_Estado <> 'BA' ";

                $result = mysqli_query($conn, $query);
            }catch(Exception $e){
              echo 'Error: '.$e->getMessage(); 
            }
                
                $iTotal = 0;
            ?>
            <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="">
                <th>Clave</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>#</th>
              </thead>
              <tbody>
                <?php
                   while($row = mysqli_fetch_array($result)){
                    $iTotal++;
                    ?>
                      <tr id="User<?php echo $row['Clave'] ?>">
                        <td><?php echo $row['Clave'] ?></td>
                        <td><?php echo $row['Tipo'] ?></td>
                        <td><?php echo $row['Nombre'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Estado'] ?></td>
                        <td class="text-center">
                            <a class="text-dark" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="javascript:EliminarUsuario('<?php echo $row['Clave']?>')"><i class="fa-solid fa-trash"></i> Eliminar</a></li>
                            </ul>
                        </td>
                      </tr>
                    <?php
                   }
                ?>
              </tbody>
              <tfoot>
                   <tr>
                    <td colspan="10">Total: <?php echo $iTotal ?></td>
                   </tr>
              </tfoot>
            </table>
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

      function EliminarUsuario(idUser){
        
        $.ajax({
            type:'POST',
            url:'./action/remove.php',
            data:{ Clave: idUser },
            success:function(data){
                if(data.substring(0,2)=='OK'){
                    $('.messagebox').html(data.substring(3));
                    $('.messagebox').addClass('messagebox_info');
                    $('#User'+idUser).remove();
                }else{
                    $('.messagebox').html(data);
                    $('.messagebox').addClass('messagebox_error');
                }
            },error:function(a,b,c){
                $('.messagebox').html(c);
                $('.messagebox').addClass('messagebox_error');
            }
        });
      }
    </script>
  </body>
</html>