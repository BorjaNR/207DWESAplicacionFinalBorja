<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */

// Comprobamos si pulsa el botón login
if (isset($_REQUEST['login'])) {
    $_SESSION['paginaEnCurso'] = 'login';
    header('Location: indexAplicacionFinal.php');
    exit();
}

require_once $view['layout'];
