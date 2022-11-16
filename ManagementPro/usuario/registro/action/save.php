<?php
    session_start();
    include ("../../../inc/conexion.php");
    
    $Nombre = (isset($_POST['nombre']))?$_POST['nombre']:'';
    $Email = (isset($_POST['email']))?$_POST['email']:'';
    $Password = (isset($_POST['password']))?$_POST['password']:'';

    if($Nombre==''){
        echo 'Falta el nombre del usuario';
        return;
    }

    if($Email==''){
        echo 'Falta el correo electrónico';
        return;
    }

    if($Password==''){
        echo 'Falta la contraseña';
        return;
    }

    try{
        $query = "SELECT Us_Cve_Usuario FROM Usuario WHERE Us_Email = '$Email' WHERE Es_Cve_Estado = 'AC'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            echo 'El correo electronico ya esta registrado';
            return;
        }

        $result->close();
        
        $LastId = 0;

        //Buscamos el siguiente Id
        $query = "SELECT MAX(Us_Cve_Usuario) as LastId FROM Usuario";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $LastId = $row['LastId'];
        }

        $result->close();
        
        //El ultimo id se suma uno para obtener el siguiente
        $NextId = $LastId + 1;

        $query = "";
        $query .= "INSERT INTO Usuario(";
        $query .= "   Us_Cve_Usuario, ";
        $query .= "   Tu_Cve_Tipo_Usuario, ";
        $query .= "   Us_Descripcion, ";
        $query .= "   Us_Email, ";
        $query .= "   Us_Password, ";
        $query .= "   Es_Cve_Estado ";
        $query .= ")VALUES( ";
        $query .= "   $NextId, ";
        $query .= "   0, "; //Tipo usuario 0 - Usuario
        $query .= "   '$Nombre', ";
        $query .= "   '$Email', ";
        $query .= "   '$Password', ";
        $query .= "   'AC')";
        
        if(mysqli_query($conn, $query)){
            echo "OK-Usuario registrado correctamente";
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>