<?php
//HTML
    if(isset($_POST['registrarVideo'])){

        $Titulo = $_POST['titulo'];
        $Descripcion = $_POST['descripcion'];
        $Url = $_POST['url'];

        $conexion = mysqli_connect("localhost", "root", "", "proyecto");
//COMPARA REPETICION
        $queryusuario = mysqli_query($conexion, "SELECT * FROM curso_video WHERE Cv_Url = '$Url'");
        $nr = mysqli_num_rows($queryusuario);
//BASE DE DATOS
        if($nr == 0){
            $resulyId = mysqli_query($conexion, "SELECT MAX(Cv_Cve_Curso_Video) as MaxId FROM curso_video");

            $idSig = 0;
            if(mysqli_num_rows($resulyId)){
                while($i = mysqli_fetch_assoc($resulyId)){
                    $idSig = $i['MaxId'];
                    
                }
            }

            $idSig++;
            
            $queryregistrar = "INSERT INTO curso_video (Cv_Cve_Curso_Video, Cv_Titulo, Cv_Descripcion, Cv_Url) VALUES ($idSig,'$Titulo', '$Descripcion', '$Url')";

            if(mysqli_query($conexion, $queryregistrar)){
                echo "<script> alert('Video Registrado Correctamente'); window.location='registrar_video.php' </script>";
            } else {
                /* No Funciona Correctamente */
                echo "Error: ".$queryregistrar."<br>".mysqli_error($conexion);
            }
        } else {
            echo "<script> alert('Ya Existe El Video En La Base De Datos'); window.location='registrar_video.php' </script>";
        }

    }

?>