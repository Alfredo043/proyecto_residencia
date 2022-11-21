<?php
    session_start();
    include ("../../../../inc/conexion.php");
    
    $Titulo = (isset($_POST['titulo']))?$_POST['titulo']:'';
    $Subtitulo = (isset($_POST['subtitulo']))?$_POST['subtitulo']:'';
    $Descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:'';

    if($Titulo==''){
        echo 'Falta el título';
        return;
    }

    if($Subtitulo==''){
        echo 'Falta el subtítulo';
        return;
    }

    if($Descripcion==''){
        echo 'Falta la descripción';
        return;
    }

    try{
        $query = "SELECT Cr_Cve_Curso FROM Curso WHERE Cr_Titulo = '$Titulo'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            echo 'La sección de capacitación ya esta registrado';
            return;
        }

        $result->close();
        
        $LastId = 0;

        //Buscamos el siguiente Id
        $query = "SELECT MAX(Cr_Cve_Curso) as LastId FROM Curso";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $LastId = $row['LastId'];
        }

        $result->close();
        
        //El ultimo id se suma uno para obtener el siguiente
        $NextId = $LastId + 1;

        $query = "";
        $query .= "INSERT INTO Curso(";
        $query .= "   Cr_Cve_Curso, ";
        $query .= "   Cr_Titulo, ";
        $query .= "   Cr_Subtitulo, ";
        $query .= "   Cr_Descripcion, ";
        $query .= "   Oper_Alta, ";
        $query .= "   Fecha_Alta, ";
        $query .= "   Es_Cve_Estado ";
        $query .= ")VALUES( ";
        $query .= "   $NextId, ";
        $query .= "   '$Titulo', ";
        $query .= "   '$Subtitulo', ";
        $query .= "   '$Descripcion', ";
        $query .= "   0, "; //Tipo usuario 0 - Usuario
        $query .= "   CURRENT_TIMESTAMP, "; //Fecha actual
        $query .= "   'AC')";
        
        if(mysqli_query($conn, $query)){
            echo "OK-Sección de capacitación registrado correctamente";
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>