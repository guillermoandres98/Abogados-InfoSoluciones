<?php

if(!isset($_SESSION)){
    session_start();
}
//Conexion 

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'abogadosbd';

$db = mysqli_connect($server, $username, $password, $database) or die ('No se pudo conectar');
mysqli_query($db, "SET NAMES 'utf8'");

