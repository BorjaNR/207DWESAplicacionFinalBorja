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

//Inicializamos la variable text a null
$text = null;

/**
 * Creamos un array para almacenar las respuestas de la api
 */
$aVistaRest = [
    'nasa' => [],
];

//Si  hay algo en el campo fecha
if (isset($_REQUEST['fecha'])) {

    //Guardamos la fecha en la sesion
    $_SESSION['nasaFecha'] = $_REQUEST['fecha'];
}

//Si hay algo en el campo texto
if (isset($_REQUEST['texto'])) {

    //Guardamos la fecha en la sesion
    $_SESSION['textoTraducido'] = $_REQUEST['texto'];
}

$aVistaRest['nasa'] = REST::apiNasa(isset( $_SESSION['nasaFecha']) ?  $_SESSION['nasaFecha'] : date('Y-m-d'));

require_once $view['layout'];