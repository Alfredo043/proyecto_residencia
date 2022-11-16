<?php
    session_start();
    include ("../../../inc/conexion.php");
    
    $Nombre = (isset($_POST['nombre']))?$_POST['nombre']:'';
    $Descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:'';
    $URL = (isset($_POST['url']))?$_POST['url']:'';

    if($Nombre==''){
        echo 'Falta el nombre del curso';
        return;
    }

    if($Descripcion==''){
        echo 'Falta la descripcion';
        return;
    }

    if($URL==''){
        echo 'Falta la URL';
        return;
    }

    try{
        $query = "SELECT Cv_Cve_Curso_Video FROM Curso_Video WHERE Cv_Url = '$URL'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            echo 'El video ya esta registrado';
            return;
        }

        $result->close();
        
        $LastId = 0;

        //Buscamos el siguiente Id
        $query = "SELECT MAX(Cv_Cve_Curso_Video) as LastId FROM Curso_Video";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $LastId = $row['LastId'];
        }

        $result->close();
        
        //El ultimo id se suma uno para obtener el siguiente
        $NextId = $LastId + 1;

        $query = "";
        $query .= "INSERT INTO Curso_Video(";
        $query .= "   Cv_Cve_Curso_Video, ";
        $query .= "   Cv_Titulo, ";
        $query .= "   Cv_Descripcion, ";
        $query .= "   Cv_Url ";
        $query .= ")VALUES( ";
        $query .= "   $NextId, ";
        $query .= "   '$Nombre', ";
        $query .= "   '$Descripcion', ";
        $query .= "   '$URL')";
        
        if(mysqli_query($conn, $query)){
            echo "OK-Video registrado correctamente";
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>