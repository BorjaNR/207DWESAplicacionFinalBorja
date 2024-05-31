<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 03/05/2024
 */
//Comprobamos si pulsa el boton volver
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: indexAplicacionFinal.php');
    exit();
}

// Ir a Wip
if (isset($_REQUEST['registrarse'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'registro';
    header('Location: indexAplicacionFinal.php');
    exit();
}

//Creamos e inicializamos las variables imprescindibles para este ejercicio
$entradaOK = true; //Variable que nos indica que todo va bien
//Array donde recogemos los mensajes de error
$aErrores = [
    'usuario' => '',
    'pass' => ''
];

//Cargar valores por defecto en los campos del formulario
//Para cada campo del formulario: Validar entrada y actuar en consecuencia
if (isset($_REQUEST['enviar'])) {
    // Validamos si el usuario existe y es oUsuarioActivo utilizando el metodo 'validarUsuario()' de la clase 'UsuarioPDO'
    $oUsuarioActivo = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['pass']);

    // Comprobamos si '$oUsuarioActivo' no esta declarado o es 'null'
    if (!isset($oUsuarioActivo)) {
        $entradaOK = false; // En caso verdadero cambiamos el valor de '$entradaOK' a 'false'
    }

    //Valido los campos
    $aErrores = [
        'usuario' => (!$oUsuarioActivo) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 32, 4, 1),
        'pass' => (!$oUsuarioActivo) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::validarPassword($_REQUEST['pass'], 32, 4, 2, 1)
    ];

    // Recorre aErrores para ver si hay alguno
    foreach ($aErrores as $campo => $valor) {
        if ($valor != null) {
            $entradaOK = false;
            // Limpiamos el campo
            $_REQUEST[$campo] = '';
        }
    }
} else {
    $entradaOK = false;
}

//Tratamiento del formulario
if ($entradaOK) {
    // Actualizamos la fecha y hora de la última conexión
    $oUsuarioActivo = UsuarioPDO::registrarUltimaConexion($oUsuarioActivo);
    // Configuramos sesiones para almacenar la información del usuario
    //Redireccionamos a el inicio privado
    $_SESSION['usuarioMiAplicacion'] = $oUsuarioActivo;
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: indexAplicacionFinal.php');
    exit();
}
require_once $view['layout'];
