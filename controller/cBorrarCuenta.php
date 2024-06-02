<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 3.0
 * @since 02/06/2024
 */
//Si el usuario pulsa cancelar  lo envia a miCuenta
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = 'mi_cuenta';
    header('Location: indexAplicacionFinal.php');
    exit;
}
//Si pulsa el boton borrarCuenta, se borra la cuenta y redirige a inicioPublico
if (isset($_REQUEST['borrarCuenta'])) { 
    $oUsuarioAEliminar = $_SESSION['usuarioMiAplicacion']->getcodUsuario();
    if (UsuarioPDO::borrarUsuario($oUsuarioAEliminar)) {
        session_destroy();
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
}
require_once $view['layout'];
?>
