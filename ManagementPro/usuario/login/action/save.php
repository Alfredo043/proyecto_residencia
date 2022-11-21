<?php
    session_start();
    include ("../../../inc/conexion.php");
    
    $Email = (isset($_POST['email']))?$_POST['email']:'';
    $Password = (isset($_POST['password']))?$_POST['password']:'';

    if($Email==''){
        echo 'Falta el correo electrónico';
        return;
    }

    if($Password==''){
        echo 'Falta la contraseña';
        return;
    }

    try{
        $query = "";
        $query .= "SELECT Us_Cve_Usuario as Clave, ";
        $query .= " Tu_Descripcion as TipoDesc, ";
        $query .= " Usuario.Tu_Cve_Tipo_Usuario as Tipo, ";
        $query .= " Us_Descripcion as Nombre, ";
        $query .= " Us_Email as Email, ";
        $query .= " Us_Password as Password, ";
        $query .= " Usuario.Es_Cve_Estado as Estado ";
        $query .= "FROM Usuario ";
        $query .= " INNER JOIN Tipo_Usuario Tu ON Tu.Tu_Cve_Tipo_Usuario = Usuario.Tu_Cve_Tipo_Usuario ";
        $query .= "WHERE ";
        $query .= " Usuario.Us_Email = '$Email' AND ";
        $query .= " Usuario.Es_Cve_Estado <> 'BA' ";
        $result = mysqli_query($conn, $query);

        if(!mysqli_num_rows($result)){
            echo 'El correo electrónico no esta registrado como usuario';
            return;
        }

        //Si tiene datos, validamos que sea la contraseña
        $row = mysqli_fetch_assoc($result);

        if($row['Password'] != $Password){
            echo "La contraseña no es valida";
            return;
        }
        
        //Si es la contraseña guardamos los datos en la sesion
        $_SESSION['usuario'] = $row['Clave'];
        $_SESSION['nombre'] = $row['Nombre'];
        $_SESSION['tipo'] = $row['Tipo'];
        $_SESSION['tipo_desc'] = $row['TipoDesc'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['estado'] = $row['Estado'];

        $result->close();
        
        echo "OK-Usuario logeado correctamente";

    }catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }

    mysqli_close($conn);
?>