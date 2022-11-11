<?php
//ESPECIFICANDO HTML
    if(isset($_POST['iniciarSesion'])){
        if(strlen($_POST['correo']) >= 1 && strlen($_POST['contrasena']) >= 1){
            $NombreUsuario = $_POST['correo'];
            $Contra = $_POST['contrasena'];

            // Conexion a la base de datos con la variable $conexion
            $conexion = mysqli_connect("localhost", "root", "", "proyecto");
            $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE Us_Email = '$NombreUsuario' AND Us_Password = '$Contra'");
            $detalles = mysqli_num_rows($consulta);
            if($detalles){
                header("location:clientes.php");
            } else {
                /* Añadido por mi */
                echo "<script> alert('Usuario o Contraseña Incorrectos'); window.location='login.php' </script>";
            }
        
            mysqli_free_result($consulta);
            mysqli_close($conexion);
            
        } else {
            echo "<script> alert('ACOMPLETE LOS CAMPOS!'); window.location='login.php' </script>";
        }
    }

?>