<?php
    session_start();
    include ("../../../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']==''){
      echo 'Advertencia: Para agregar o modificar cursos, debes iniciar sesión con una cuenta de tipo administrador';
      return;
    }
    
    $IdUsuario = $_SESSION['usuario'];
    $IdVideo = (isset($_POST['Cv_Cve_Curso_Video']))?$_POST['Cv_Cve_Curso_Video']:'';
    $IdCurso = (isset($_POST['Cr_Cve_Curso']))?$_POST['Cr_Cve_Curso']:'';

    $Titulo = (isset($_POST['Cv_Titulo']))?$_POST['Cv_Titulo']:'';
    $Enlace = (isset($_POST['Cv_Url']))?$_POST['Cv_Url']:'';
    $Descripcion = (isset($_POST['Cv_Descripcion']))?$_POST['Cv_Descripcion']:'';

    // date_default_timezone_set("America/Mexico_City");
    // $fechaActual = date('Y-m-d H:i:s');

    if($IdCurso==''){
        echo 'Advertencia: No se encontro el id del curso';
        return;
    }

    if($Titulo==''){
        echo 'Advertencia: Falta el título';
        return;
    }

    if($Enlace==''){
        echo 'Advertencia: Falta el enlace del video';
        return;
    }

    if($Descripcion==''){
        echo 'Falta la descripción';
        return;
    }

    try{
        
        if($IdVideo==''){
            $query = "SELECT Cv_Cve_Curso_Video FROM Curso_Video WHERE Cv_Url = '$Enlace' ";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result)){
                echo 'El video ya esta registrado';
                return;
            }

            $result->close();

            $LastId = 0;

            //Buscamos el siguiente Id
            $query = "SELECT MAX(Cv_Cve_Curso_Video) as LastId FROM Curso_Video ";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result)){
                $row = mysqli_fetch_assoc($result);
                $LastId = $row['LastId'];
            }

            $result->close();
            
            //El ultimo id se suma uno para obtener el siguiente
            $NextId = $LastId + 1;
            $IdVideo = $NextId;
            
            $query = "";
            $query .= "INSERT INTO Curso_Video(";
            $query .= "   Cv_Cve_Curso_Video, ";
            $query .= "   Cr_Cve_Curso, ";
            $query .= "   Cv_Titulo, ";
            $query .= "   Cv_Descripcion, ";
            $query .= "   Cv_Url, ";
            $query .= "   Es_Cve_Estado ";
            $query .= ")VALUES( ";
            $query .= "   $IdVideo, ";
            $query .= "   $IdCurso, "; //Tipo usuario 0 - Usuario
            $query .= "   '$Titulo', ";
            $query .= "   '$Descripcion', ";
            $query .= "   '$Enlace', ";
            $query .= "   'AC')";
        }else{

            //Si es edicion se actualizan los datos
            $query = "";
            $query .= "UPDATE Curso_Video SET ";
            $query .= " Cv_Titulo = '".$Titulo."', ";
            $query .= " Cv_Descripcion = '".$Descripcion."', ";
            $query .= " Cv_Url = '".$Enlace."' ";
            $query .= "WHERE Cv_Cve_Curso_Video = '$IdVideo' ";
        }
        
        if(mysqli_query($conn, $query)){
            echo "OK-Datos guardados correctamente";
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>