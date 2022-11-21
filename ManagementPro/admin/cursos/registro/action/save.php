<?php
    session_start();
<<<<<<< HEAD
    include ("../../../../inc/conexion.php");
    
    $Titulo = (isset($_POST['titulo']))?$_POST['titulo']:'';
    $Subtitulo = (isset($_POST['subtitulo']))?$_POST['subtitulo']:'';
    $Descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:'';
    date_default_timezone_set("America/Mexico_City");
    $mifecha = date('Y-m-d H:i:s');

    if($Titulo==''){
        echo 'Falta el título';
        return;
    }

    if($Subtitulo==''){
        echo 'Falta el subtítulo';
=======
    include ("../../../inc/conexion.php");
    
    $Nombre = (isset($_POST['nombre']))?$_POST['nombre']:'';
    $Descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:'';
    $URL = (isset($_POST['url']))?$_POST['url']:'';

    if($Nombre==''){
        echo 'Falta el nombre del curso';
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
        return;
    }

    if($Descripcion==''){
<<<<<<< HEAD
        echo 'Falta la descripción';
=======
        echo 'Falta la descripcion';
        return;
    }

    if($URL==''){
        echo 'Falta la URL';
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
        return;
    }

    try{
<<<<<<< HEAD
        $query = "SELECT Cr_Cve_Curso FROM Curso WHERE Cr_Titulo = '$Titulo'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            echo 'La sección de capacitación ya esta registrado';
=======
        $query = "SELECT Cv_Cve_Curso_Video FROM Curso_Video WHERE Cv_Url = '$URL'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            echo 'El video ya esta registrado';
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
            return;
        }

        $result->close();
        
        $LastId = 0;

        //Buscamos el siguiente Id
<<<<<<< HEAD
        $query = "SELECT MAX(Cr_Cve_Curso) as LastId FROM Curso";
=======
        $query = "SELECT MAX(Cv_Cve_Curso_Video) as LastId FROM Curso_Video";
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $LastId = $row['LastId'];
        }

        $result->close();
        
        //El ultimo id se suma uno para obtener el siguiente
        $NextId = $LastId + 1;

        $query = "";
<<<<<<< HEAD
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
        $query .= "   '$mifecha', "; //Fecha actual
        $query .= "   'AC')";
        
        if(mysqli_query($conn, $query)){
            echo "OK-Sección de capacitación registrado correctamente";
=======
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
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>