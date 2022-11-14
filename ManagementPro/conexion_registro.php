<?php
//HTML
    if(isset($_POST['registrarUsuario'])){

        $Usuario = $_POST['nombre'];
        $Correo = $_POST['correo'];
        $Contra = $_POST['contrasena'];

        $conexion = mysqli_connect("localhost", "root", "", "proyecto");
        //COMPARA REPETICION
        $queryusuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE Us_Email = '$Correo'");
        $nr = mysqli_num_rows($queryusuario);
        //BASE DE DATOS
        if($nr == 0){
            $resulyId = mysqli_query($conexion, "SELECT MAX(Us_Cve_Usuario) as MaxId FROM usuario");

            $idSig = 0;
            if(mysqli_num_rows($resulyId)){
                while($i = mysqli_fetch_assoc($resulyId)){
                    $idSig = $i['MaxId'];
                }
            }

            $idSig++;
            
            $queryregistrar = "INSERT INTO usuario (Us_Cve_Usuario, Us_Descripcion, Us_Email, Us_Password) VALUES ($idSig,'$Usuario', '$Correo', '$Contra')";

            if(mysqli_query($conexion, $queryregistrar)){
                echo "<script> alert('Usuario Registrado Correctamente'); window.location='login.php' </script>";
            } else {
                /* No Funciona Correctamente */
                echo "Error: ".$queryregistrar."<br>".mysqli_error($conexion);
            }
        } else {
            echo "<script> alert('Ya Existe El Usario En La Base De Datos'); window.location='login.php' </script>";
        }

    }

?>