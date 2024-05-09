<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 03/05/2024
 */
//Si se intenta acceder a la pagina sin iniciar sesion redirige a la pagina de inicio de la aplicación
if (empty($_SESSION['user207AplicacionFinal'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: indexAplicacionFinal.php');
    exit();
}
// Cerrar sesión al hacer clic en el botón
if (isset($_REQUEST['cerrar_sesion'])) {
    session_destroy(); // Destruye la sesión
    header('Location: indexAplicacionFinal.php'); // Redirige a la página de inicio de sesión
    exit();
}

// Ir a detalle al pulsar el boton
if (isset($_REQUEST['detalle'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'detalle';
    header('Location: indexAplicacionFinal.php');
    exit();
}

// Ir a Wip
if (isset($_REQUEST['mto_departamentos'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'mto_departamento';
    header('Location: indexAplicacionFinal.php');
    exit();
}

// Ir a Mi Cuenta
if (isset($_REQUEST['mi_cuenta'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'wip';
    header('Location: indexAplicacionFinal.php');
    exit();
}

// Ir a Error
if (isset($_REQUEST['error'])) {
    $consulta = "SELECT * FROM T03_Administracion";
    DBPDO::ejecutaConsulta($consulta);
    exit();
}

// Ir a Rest
if (isset($_REQUEST['rest'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'rest';
    header('Location: indexAplicacionFinal.php');
    exit();
}

//Construimos un array con los datos que necesita la vista
$avInicioPrivado = [
    'descUsuario' =>  $_SESSION['user207AplicacionFinal']->getdescUsuario(),
    'numConexiones' => $_SESSION['user207AplicacionFinal']->getnumAcceso(),
    'ultimaConexionAnterior' => $_SESSION['user207AplicacionFinal']->getfechaHoraUltimaConexionAnterior()
];

require_once $view['layout'];
