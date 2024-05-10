<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 08/05/2024
 */

//Si le da al boton volver vuelve a la pagina de inicio privado
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexAplicacionFinal.php'); 
    exit();
}

/**
 * Creamos un array para almacenar las respuestas de la api
 */
$aVistaRest = [
    'nasa' => [],
    'AEMET' => '',
];

//Si  hay algo en el campo fecha
if (isset($_REQUEST['fechaNasa'])) {

    //Guardamos la fecha en la sesion
    $_SESSION['nasaFechaEnCurso'] = $_REQUEST['fechaNasa'];
}

//Guardamos en sesion la provincia
if (isset($_REQUEST['provincia'])) {
    $_SESSION['provinciaSeleccionada'] = $_REQUEST['provincia'];
}

$aVistaRest['nasa'] = REST::apiNasa(isset( $_SESSION['nasaFechaEnCurso']) ?  $_SESSION['nasaFechaEnCurso'] : date('Y-m-d'));
$aVistaRest['AEMET'] = REST::apiAemet(isset($_SESSION['provinciaSeleccionada']) ? $_SESSION['provinciaSeleccionada'] : '01');

require_once $view['layout'];