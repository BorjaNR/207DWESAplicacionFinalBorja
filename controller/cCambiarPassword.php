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

// Declaracion de la variable de confirmación de envio de formulario correcto
$entradaOK = true;

// Declaramos el array de errores y lo inicializamos vacío
$aErrores = ['contraseña' => ""];
$aErrores = ['nuevaContraseña' => ""];
$aErrores = ['repetirNuevaContraseña' => ""];

// Declaramos el array de respuestas y lo inicializamos vacío
$aRespuestas = ['contraseña' => ""];
$aRespuestas = ['nuevaContraseña' => ""];
$aRespuestas = ['repetirNuevaContraseña' => ""];

if (isset($_REQUEST['guardarCambios'])) {
    $aErrores['contraseña'] = validacionFormularios::validarPassword($_REQUEST['contraseña'], 8, 3, 1, 1);
    $aErrores['nuevaContraseña'] = validacionFormularios::validarPassword($_REQUEST['nuevaContraseña'], 8, 3, 1, 1);
    $aErrores['repetirNuevaContraseña'] = validacionFormularios::validarPassword($_REQUEST['repetirNuevaContraseña'], 8, 3, 1, 1);

    // Por medio del método 'validarUsuario()' de la clase 'UsuarioPDO' comprobamos que la contraseña actual es la correcta
    if (!UsuarioPDO::validarUsuario($_SESSION['usuarioMiAplicacion']->getcodUsuario(), $_REQUEST['contraseña'])) {
        $aErrores['contraseña'] = "Contraseña incorrecta"; // En caso incorrecto cargamos un mensaje de error
    }

    // Comprobamos que la nueva contraseña es correcta en ambos campos
    if ($_REQUEST['nuevaContraseña'] != $_REQUEST['repetirNuevaContraseña']) {
        // Si no cargamos un mensaje de error
        $aErrores['nuevaContraseña'] = "No coinciden las contraseñas";
        $aErrores['repetirNuevaContraseña'] = "No coinciden las contraseñas";
    }

    // Recorremos el array de errores
    foreach ($aErrores as $campo => $error) {
        if ($error != null) { // Comprobamos que el campo no esté vacio
            $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario
            $_REQUEST[$campo] = ""; // Limpiamos los campos del formulario
        }
    }
} else {
    $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
}
if ($entradaOK) { // Si el usuario ha rellenado el formulario correctamente rellenamos el array aFormulario con las respuestas introducidas por el usuario
    /*
     * Por medio del método 'cambiarPassword()' de la clase 'UsuarioPDO' modificamos la contraseña actual 
     * por la nueva y al macenamos al nuevo Usuario en una variable de sesión
     */
    $_SESSION['usuarioMiAplicacion'] = UsuarioPDO::cambiarPassword($_SESSION['usuarioMiAplicacion'], $_REQUEST['nuevaContraseña']);
    $_SESSION['paginaEnCurso'] = 'mi_cuenta'; // Asigno a la página en curso la pagina de miCuenta
    header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
    exit;
}

require_once $view['layout'];
?>

