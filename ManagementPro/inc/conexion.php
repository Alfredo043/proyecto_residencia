<?php
    $_SESSION['error'] = '';
    $_SESSION['conexion'] = 'NO';

    try {
        $db_server = 'localhost';
        $db_name = 'proyecto';
        $db_user = 'root';
        $db_pass = '';
        
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        
        if(!$conn){
            $_SESSION['error'] = 'Conexion: '.mysqli_connect_error();
        }else{
            $_SESSION['error'] = '';
            $_SESSION['conexion'] = 'SI';
        }
    }catch(Exception $e){
        $_SESSION['error'] = 'Ocurrio un error: '.$e->getMessage();
    }

    function Existe_Clave($tabla, $campo, $valor, $retorno, $ext){
      global $conn;
      
      $gvvalor = "";
      if($tabla=='') return "";
      if($campo=='') return "";
      //if($valor=='') return "";
      if($retorno=='') return "";
      if($ext=='') $ext = "1 = 1";
        
      try{ 
        $gvq = "";
        $gvq .= "SELECT ";
        $gvq .= " $retorno as Valor ";
        $gvq .= "FROM $tabla ";
        $gvq .= "WHERE $campo = '$valor' AND ($ext) ";
        $resultEc = mysqli_query($conn, $gvq);
        
        if(mysqli_num_rows($resultEc)){
          $gvRow = mysqli_fetch_array($resultEc);
          $gvvalor = $gvRow['Valor'];
        }

        $resultEc->close();
      }catch(Exception $e){
        $gvvalor = 'Error: '.$e->getMessage();
      }
      return $gvvalor;
    }
?>