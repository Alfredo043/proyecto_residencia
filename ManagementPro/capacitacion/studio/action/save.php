<?php
    session_start();
    include ("../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';

    if($_SESSION['usuario']==''){
      echo 'Advertencia: Debes iniciar sesion para guardar progreso';
      return;
    }
    
    $IdUsuario = $_SESSION['usuario'];
    $IdVideo = (isset($_POST['Curso']))?$_POST['Video']:'';
    $IdCurso = (isset($_POST['Video']))?$_POST['Curso']:'';
    
    $Duracion = (isset($_POST['Duracion']))?$_POST['Duracion']:'0';
    $Segundos = (isset($_POST['Segundos']))?$_POST['Segundos']:'0';
    
    if($IdCurso==''){
        echo 'Advertencia: No se encontro el id del curso';
        return;
    }

    if($IdVideo==''){
        echo 'Advertencia: No se encontro el id del video';
        return;
    }
    
    try{
        
        $query = "SELECT Cr_Cve_Curso FROM Curso_Usuario WHERE Cr_Cve_Curso = '$IdCurso' AND Us_Cve_Usuario = '$IdUsuario' ";
        $result = mysqli_query($conn, $query);

        if(!mysqli_num_rows($result)){
            //Si no existe lo insertamos
            $query = "INSERT INTO Curso_Usuario VALUES ('$IdUsuario','$IdCurso',NOW()) ";
            if(!mysqli_query($conn, $query)){
                //No se registro bien
                echo "Error: ".mysqli_error($conn);
                return;
            }
        }

        $result->close();

        //Ahora buscamos si esta el registro del video
        $query = "SELECT Cr_Cve_Curso FROM Curso_Video WHERE Cr_Cve_Curso = '$IdCurso' AND Cv_Cve_Curso_Video = '$IdVideo' AND Cv_Tiempo = 0 ";
        $qV = $query;
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) && $Duracion>0){
            //Si existe y no tiene tiempo, lo actualizamos
            $query = "UPDATE Curso_Video SET Cv_Tiempo = $Duracion WHERE Cr_Cve_Curso = '$IdCurso' AND Cv_Cve_Curso_Video = '$IdVideo' ";
            if(!mysqli_query($conn, $query)){
                //No se registro bien
                echo "Error: ".mysqli_error($conn);
                return;
            }
        }

        $result->close();

        //Ya procesado, pasamos a registrar los datos
        $query = "";
        $query .= "SELECT Cr_Cve_Curso FROM Curso_Usuario_Video ";
        $query .= "WHERE Cr_Cve_Curso = '$IdCurso' AND ";
        $query .= " Cv_Cve_Curso_Video = '$IdVideo' AND ";
        $query .= " Us_Cve_Usuario = '$IdUsuario' ";
        $result = mysqli_query($conn, $query);

        if(!mysqli_num_rows($result)){
            //Si no existe lo insertamos
            $query = "";
            $query .= "INSERT INTO Curso_Usuario_Video(";
            $query .= "   Cv_Cve_Curso_Video, ";
            $query .= "   Cr_Cve_Curso, ";
            $query .= "   Us_Cve_Usuario, ";
            $query .= "   Cuv_Fecha, ";
            $query .= "   Cuv_Fecha_Modif, ";
            $query .= "   Cuv_Tiempo ";
            $query .= ")VALUES( ";
            $query .= "   $IdVideo, ";
            $query .= "   $IdCurso, ";
            $query .= "   $IdUsuario, ";
            $query .= "   NOW(), ";
            $query .= "   NOW(), ";
            $query .= "   $Segundos)";
            
        }else{
            $query = "";
            $query .= "UPDATE Curso_Usuario_Video SET ";
            $query .= " Cuv_Fecha_Modif = NOW(), ";
            $query .= " Cuv_Tiempo = ".$Segundos." ";
            $query .= "WHERE Cv_Cve_Curso_Video = '$IdVideo' AND Cr_Cve_Curso = '$IdCurso' AND Us_Cve_Usuario = '$IdUsuario' ";
            $query .= " AND Cuv_Tiempo < $Segundos "; //Se guarda solo si es mayor, para que no se pierda el historico de reproduccion
        }
        
        if(mysqli_query($conn, $query)){
            echo "OK-Guardado: ".date("Y-m-d H:i:s");
        }else{
            echo "Error: ".mysqli_error($conn);
        }

        $result->close();
        
    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>