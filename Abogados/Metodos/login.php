<?php
require_once '../Metodos/conexion.php';

    
if (isset($_POST)) {
    
    
    //Borrar error antiguo
    if(isset($_SESSION['errorLogin'])){
        $_SESSION['error_login'] = null;
        session_unset($_SESSION['error_login']);
    }
    
    $email = trim($_POST['email']);
    $password = md5($_POST['password']);
    
    //Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE correo = '$email' AND clave = '$password'";
    $login = mysqli_query($db, $sql);
    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['errorLogin'] = null;
        if ($_SESSION['usuario']['id'] == 1) {
            header("Location: ../Vistas/inicioAdmin.php");
        }else{
            header("Location: ../Vistas/indexAbogado.php");
        }
    }else{
        $_SESSION['errorLogin'] = "Usuario o contraseña invalidos";
        header("Location: ../index.php");
    }
}else{
    
    $_SESSION['errorLogin'] = "Faltan Datos";
    header("Location: ../index.php");
}