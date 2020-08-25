<?php
require_once 'conexion.php';

if (isset($_POST)) {
    
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $rut = isset($_POST['rut_contacto']) ? mysqli_escape_string($db, $_POST['rut_contacto']) : false;
    $nombre = isset($_POST['nombre_contacto']) ? mysqli_escape_string($db, $_POST['nombre_contacto']) : false;
    $apellidos = isset($_POST['apellido_contacto']) ? mysqli_escape_string($db, $_POST['apellido_contacto']) : false;
    $correo = isset($_POST['correo_contacto']) ? mysqli_escape_string($db, trim($_POST['correo_contacto'])) : false;
    $telefono= isset($_POST['telefono_contacto']) ? mysqli_escape_string($db, $_POST['telefono_contacto']) : false;
    $causa = isset($_POST['seleccion_causa']) ? mysqli_escape_string($db, $_POST['seleccion_causa']) : false;
    $comentario = isset($_POST['Detalle']) ? mysqli_escape_string($db, $_POST['Detalle']) : false;
    
    $errores = array();
    // Validar los datos antes de guardarlos en la db
//Validar rut
    if (!empty($rut)) {
        $nombre_validate = true;
        
    } else {
        $nombre_validate = false;
        $errores['nombre'] = "El nombre no es valido";
    }
//Validar Nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validate = true;
    } else {
        $nombre_validate = false;
        $errores['nombre'] = "El nombre no es valido";
    }

//Validar Apellido
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validate = true;
    } else {
        $apellidos_validate = false;
        $errores['apellidos'] = "Los apellidos no es valido";
    }

//Validar Email
    if (!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $correo_validate = true;
    } else {
        $correo_validate = false;
        $errores['email'] = "El EMAIL no es valido";
    }
//Validar Telefono
    if (!empty($telefono)) {
        $telefono_validate = true;
    } else {
        $telefono_validate = false;
        $errores['Telefono'] = "El telefono no es valido";
    }
//Validar Causa
    if (!empty($causa)) {
        $causa_validate = true;
    } else {
        $causa_validate = false;
        $errores['Causa'] = "La causa no es valida";
    }


    $sql = "SELECT correo FROM persona WHERE correo = '$correo'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        $guardar_usuario = false;
        
    if (count($errores) == 0 && empty($isset_user)) {
        $guardar_usuario = TRUE;
        
        
        $sql = "INSERT INTO persona VALUES(null, '$rut','$nombre', '$apellidos', '$telefono','$correo')";
        $guardar = mysqli_query($db, $sql);
        
        $queryID = "select id_persona from persona order by id_persona DESC LIMIT 0,1";
        $guardarID = mysqli_query($db, $queryID);
        $fila = mysqli_fetch_row($guardarID);
        $idfinalPersona = $fila[0];
        
        $sql2 = "INSERT INTO contacto VALUES(null, CURDATE(), $idfinalPersona)";
        $guardar2 = mysqli_query($db, $sql2);
        
        $queryID2 = "select id_contacto from contacto order by id_contacto DESC LIMIT 0,1";
        $guardarIDcontacto = mysqli_query($db, $queryID2);
        $fila2 = mysqli_fetch_row($guardarIDcontacto);
        $idfinalcontacto = $fila2[0];
        
        $sql3 = "INSERT INTO detallecausa VALUES(null, 'Activa', CURDATE(), $idfinalcontacto, $causa, '$comentario')";
        $guardar3 = mysqli_query($db, $sql3);
        if ($guardar && $guardar2 && $guardar3) {
            $_SESSION['completadoIngreso'] = "Consulta Ingresado con exito";
            $url_salida = '../RegistroFormulario.php';
            echo "<script language=Javascript> location.href='$url_salida';</script>";
        } else {
            $_SESSION['ErrorIngreso'] = "No se pudo ingresar la consulta";
            $url_salida = '../RegistroFormulario.php';
            echo "<script language=Javascript> location.href='$url_salida';</script>";
        }
    } else {
        $_SESSION['ErrorIngreso'] = "Faltan datos o el email ya existe";
        $url_salida = '../RegistroFormulario.php';
        echo "<script language=Javascript> location.href='$url_salida';</script>";
    }
}