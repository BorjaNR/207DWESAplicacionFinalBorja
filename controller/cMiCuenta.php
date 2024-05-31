<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 3.0
 * @since 30/05/2024
 */
// Redirige a inicioPrivado
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexAplicacionFinal.php');
    exit();
}


$avMiCuenta = [
    'codUsuario' => $_SESSION['usuarioMiAplicacion']->getcodUsuario(),
    'contraseña' => $_SESSION['usuarioMiAplicacion']->getpassword(),
    'descUsuario' => $_SESSION['usuarioMiAplicacion']->getdescUsuario(),
    'nConexiones' => $_SESSION['usuarioMiAplicacion']->getnumAcceso(),
    'fechaHoraUltimaConexionAnterior' => $_SESSION['usuarioMiAplicacion']->getfechaHoraUltimaConexionAnterior()
];

$aErrores['descUsuario'] = "";
$entradaOK = true;
// Guarda los cambios realizados y envia a inicioPrivado
if (isset($_REQUEST['enviar'])) {
    if ($_REQUEST['descUsuario'] != $avMiCuenta['descUsuario']) {
        $aErrores['descUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 255, 3, 1);
    } else {
        $aErrores['descUsuario'] = "Este usuario ya tiene esta descripcion";
    }
    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }

    if ($entradaOK) {
        $_SESSION['usuarioMiAplicacion'] = UsuarioPDO::modificarUsuario($_SESSION['usuarioMiAplicacion'], $_REQUEST['descUsuario']);
        //Redireccionamos a el inicio privado
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('Location: indexAplicacionFinal.php');
        exit();
    }
}

require_once $view['layout'];
