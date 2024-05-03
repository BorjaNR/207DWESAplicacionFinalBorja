<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 03/05/2024
 */
//Comprobamos si pulsa el boton volver
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexAplicacionFinal.php');
    exit();
}

//Creamos e inicializamos las variables imprescindibles para este ejercicio
$entradaOK = true; //Variable que nos indica que todo va bien
//Array donde recogemos los mensajes de error
$aRespuestas = [
    'T01_CodUsuario' => "",
    'T01_DescUsuario' => "",
    'T01_Password' => "",
    'repetirPassword' => ""
];

$aErrores = [
    'T01_CodUsuario' => "",
    'T01_DescUsuario' => "",
    'T01_Password' => "",
    'repetirPassword' => ""
];

//Cargar valores por defecto en los campos del formulario
//Para cada campo del formulario: Validar entrada y actuar en consecuencia
if (isset($_REQUEST['enviar'])) {
    //Valido los campos
    $aErrores['T01_CodUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T01_CodUsuario'], 8, 3, 1);
    $aErrores['T01_DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T01_DescUsuario'], 255, 3, 1);
    $aErrores['T01_Password'] = validacionFormularios::validarPassword($_REQUEST['T01_Password'], 8, 3, 1, 1);
    $aErrores['repetirPassword'] = validacionFormularios::validarPassword($_REQUEST['repetirPassword'], 8, 3, 1, 1);
    
    //Comprobamos si ya existe un usuario con ese codigo
    if(UsuarioPDO::validarCodNoExiste($_REQUEST['T01_CodUsuario'])){
        $aErrores['T01_CodUsuario'] = "El usuario ya existe";
    }
    
    // Comprobamos si son distintas las contraseñas y cargamos un mensaje de error
    if ($_REQUEST['T01_Password'] != $_REQUEST['repetirPassword']) {
        $aErrores['T01_Password'] = "Las contraseñas no coinciden.";
        $aErrores['repetirPassword'] = "Las contraseñas no coinciden.";
    }
    
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
    //Respuestas del formulario
    $aRespuestas['T01_CodUsuario'] = $_REQUEST['T01_CodUsuario'];
    $aRespuestas['T01_DescUsuario'] = $_REQUEST['T01_DescUsuario'];
    $aRespuestas['T01_Password'] = $_REQUEST['T01_Password'];
    $aRespuestas['repetirPassword'] = $_REQUEST['repetirPassword'];
    
    //Registramos el usuario
    $oUsuarioRegistrado = UsuarioPDO::altaUsuario($_REQUEST['T01_CodUsuario'], $_REQUEST['T01_Password'], $_REQUEST['T01_DescUsuario']);
            
    // Configuramos sesiones para almacenar la información del usuario
    //Redireccionamos a el inicio privado
    $_SESSION['user207AplicacionFinal'] = $oUsuarioRegistrado;
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: indexAplicacionFinal.php');
    exit();
}
require_once $view['layout'];



    