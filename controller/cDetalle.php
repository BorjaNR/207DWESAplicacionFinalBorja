<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 03/05/2024
 */
//Si se intenta acceder a la pagina sin iniciar sesion redirige a la pagina de inicio de la aplicación
if (empty($_SESSION['usuarioMiAplicacion'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: indexAplicacionFinal.php');
    exit();
}
//Si le da al boton volver vuelve a la pagina de inicio privado
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: indexAplicacionFinal.php'); 
    exit();
}
require_once $view['layout'];
