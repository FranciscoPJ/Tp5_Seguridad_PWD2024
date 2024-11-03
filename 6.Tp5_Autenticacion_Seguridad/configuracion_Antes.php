<?php
header('Content-Type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");

// CONFIGURACION APP
$PROYECTO = '6.Tp5_Autenticacion_Seguridad';

// Define ROOT como constante
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . "/$PROYECTO/");

// Incluye las funciones después de definir ROOT
include_once(ROOT . 'Util/funciones.php');

// Variable que define la página de autenticación del proyecto
$INICIO = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/vista/login/login.php";

// Variable que define la página principal del proyecto (menú principal)
$PRINCIPAL = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/principal.php";
?>
