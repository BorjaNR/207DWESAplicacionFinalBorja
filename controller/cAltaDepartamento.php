<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 16/05/2024
 */
//Comprobamos si pulsa el boton volver
if (isset($_REQUEST['cancelar'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = 'mto_departamento';
    header('Location: indexAplicacionFinal.php'); 
    exit();
}

//Creamos e inicializamos las variables imprescindibles para este ejercicio
$entradaOK = true; //Variable que nos indica que todo va bien
//Array donde recogemos los mensajes de error
$aErrores = [
    'CodDepartamento' => "",
    'DescDepartamento' => "",
    'FechaCreacionDepartamento' => "",
    'VolumenDeNegocio' => "",
    'FechaBajaDepartamento' => ""
];

$aRespuestas = [
    'CodDepartamento' => "",
    'DescDepartamento' => "",
    'FechaCreacionDepartamento' => "",
    'VolumenDeNegocio' => "",
    'FechaBajaDepartamento' => ""
];

// Variable DateTime
$fechaYHoraActualCreacion = new DateTime('now', new DateTimeZone('Europe/Madrid'));
// Y formateo la variable '$fechaYHoraActualCreacion' para que aparezca en el input 'YYYY-mm-dd'
$fechaYHoraActualCreacionFormateada = $fechaYHoraActualCreacion->format('Y-m-d');

//Cargar valores por defecto en los campos del formulario
//Para cada campo del formulario: Validar entrada y actuar en consecuencia
if (isset($_REQUEST['enviar'])) {
    //Valido la entrada de descripcion departamento
    $aErrores['CodDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'], 3, 3, 1);
    
    // Ahora validamos que el codigo introducido no exista en la BD, haciendo una consulta 
    if ($aErrores['CodDepartamento'] == null) {
        /*
         * Por medio del metodo 'validarCodNoExiste' de la clase 'DepartamentoPDO' comprobamos que el código no este en uso
         */
        if (DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['CodDepartamento'])) {
            $aErrores['CodDepartamento'] = "El código de departamento ya existe";
        }
    }
    
    $aErrores['DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 255, 1, 1);
    $aErrores['FechaCreacionDepartamento'] = NULL;
    $aErrores['VolumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['VolumenDeNegocio'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, 1);
    $aErrores['FechaBajaDepartamento'] = NULL;
    
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
//En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas'
if ($entradaOK) {
    // Usando el metodo 'altaDepartamento' de la clase 'DepartamentoPDO' añadimos el departamento
    DepartamentoPDO::altaDepartamento($_REQUEST['CodDepartamento'], $_REQUEST['DescDepartamento'], $_REQUEST['VolumenDeNegocio']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['paginaAnterior'] = '';
    header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
    exit;
}

require_once $view['layout'];