<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 03/05/2024
 */

//Si le da al boton volver vuelve a la pagina de inicio privado
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexAplicacionFinal.php'); 
    exit();
}
require_once $view['layout'];

