<?php
    session_start();
    include ("../../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']==''){
      echo 'Advertencia: Para agregar o modificar cursos, debes iniciar sesión con una cuenta de tipo administrador';
      return;
    }
    
    $IdUsuario = $_SESSION['usuario'];
    $IdUser = (isset($_POST['Us_Cve_Usuario']))?$_POST['Us_Cve_Usuario']:'';

    $Nombre = (isset($_POST['Us_Descripcion']))?$_POST['Us_Descripcion']:'';
    $Tipo = (isset($_POST['Tu_Descripcion']))?$_POST['Tu_Descripcion']:'';
    // $Descripcion = (isset($_POST['Cr_Descripcion']))?$_POST['Cr_Descripcion']:'';

    // date_default_timezone_set("America/Mexico_City");
    // $fechaActual = date('Y-m-d H:i:s');

    if($Nombre==''){
        echo 'Advertencia: Falta el nombre';
        return;
    }

    if($Tipo==''){
        echo 'Advertencia: Falta el tipo de usuario';
        return;
    }

    // if($Descripcion==''){
        //echo 'Falta la descripción';
        //return;
    // }

    try{
        
        if($IdUser==''){
            $query = "SELECT Us_Cve_Usuario FROM Usuario WHERE Us_Descripcion = '$Nombre' ";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result)){
                echo 'El nombre ya esta registrado';
                return;
            }

            $result->close();

        //     $LastId = 0;

        //     //Buscamos el siguiente Id
        //     $query = "SELECT MAX(Cr_Cve_Curso) as LastId FROM Curso";
        //     $result = mysqli_query($conn, $query);

        //     if(mysqli_num_rows($result)){
        //         $row = mysqli_fetch_assoc($result);
        //         $LastId = $row['LastId'];
        //     }

        //     $result->close();
            
        //     //El ultimo id se suma uno para obtener el siguiente
        //     $NextId = $LastId + 1;
        //     $IdCurso = $NextId;
            
        //     $query = "";
        //     $query .= "INSERT INTO Curso(";
        //     $query .= "   Cr_Cve_Curso, ";
        //     $query .= "   Cr_Titulo, ";
        //     $query .= "   Cr_Subtitulo, ";
        //     $query .= "   Cr_Descripcion, ";
        //     $query .= "   Oper_Alta, ";
        //     $query .= "   Fecha_Alta, ";
        //     $query .= "   Oper_Modif, ";
        //     $query .= "   Fecha_Modif, ";
        //     $query .= "   Es_Cve_Estado ";
        //     $query .= ")VALUES( ";
        //     $query .= "   $IdCurso, ";
        //     $query .= "   '$Titulo', ";
        //     $query .= "   '$Subtitulo', ";
        //     $query .= "   '$Descripcion', ";
        //     $query .= "   '".$_SESSION['usuario']."', "; //Usuario
        //     $query .= "   '$fechaActual', "; //Fecha actual
        //     $query .= "   '".$_SESSION['usuario']."', "; //Usuario
        //     $query .= "   '$fechaActual', "; //Fecha actual
        //     $query .= "   'AC')";
        // }else{

            //Si es edicion se actualizan los datos
            $query = "";
            $query .= "UPDATE Usuario SET ";
            $query .= " Us_Descripcion = '".$Nombre."', ";
            $query .= " Tu_Descripcion = '".$Tipo."' ";
            // $query .= " Cr_Descripcion = '".$Descripcion."', ";
            // $query .= " Oper_Modif = '".$_SESSION['usuario']."', ";
            // $query .= " Fecha_Modif = '".$fechaActual."' ";
            $query .= "WHERE Us_Cve_Usuario = '$IdUser' ";
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