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
    $_SESSION['nasaFechaEnCurso'] = date("Y-m-d");
    $_SESSION['AEMETProvinciaEnCurso'] = 49;
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

$_SESSION['nasaFechaEnCurso'] = date("Y-m-d");

//Si  hay algo en el campo fecha
if (isset($_REQUEST['fechaNasa'])) {

    //Guardamos la fecha en la sesion
    $_SESSION['nasaFechaEnCurso'] = $_REQUEST['fechaNasa'];
}

$oFotoNasaEnCurso = REST::apiNasa($_SESSION['nasaFechaEnCurso']);
$aVistaRest['nasa']['titulo'] = $oFotoNasaEnCurso->getTitulo();
$aVistaRest['nasa']['foto'] = $oFotoNasaEnCurso->getFoto();

/*if (isset($_SESSION['nasaFechaEnCurso'])) {
    
}
*/
$_SESSION['AEMETProvinciaEnCurso'] = '49';

//Guardamos en sesion la provincia
if (isset($_REQUEST['provincia'])) {
    $_SESSION['AEMETProvinciaEnCurso'] = $_REQUEST['provincia'];
}
$oProvinciaEnCurso = REST::apiAemet($_SESSION['AEMETProvinciaEnCurso']);
$aVistaRest['AEMET'] = $oProvinciaEnCurso->getPrediccion();

require_once $view['layout'];