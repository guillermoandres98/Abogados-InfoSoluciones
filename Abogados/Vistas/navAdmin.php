<?php require_once '../Metodos/conexion.php'; ?>
<?php require_once '../Metodos/helpers.php'; ?>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <link type="text/css" rel="stylesheet" href="../css/style2.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <nav>
        <div class="nav-wrapper">
            <a  class="brand-logo">Bienvenido: Bienvenido: <?= $_SESSION['usuario']['nombre'] ?> <?= $_SESSION['usuario']['apellido'] ?></a>            
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                 <li><a href="inicioAbogado.php">Asignar Causas</a></li>               
                <li><a href="../index.php" class="boton boton-rojo">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>
