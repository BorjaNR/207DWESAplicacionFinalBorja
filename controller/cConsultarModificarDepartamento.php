<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 10/05/2024
 */
//Comprobamos si pulsa el boton volver
if (isset($_REQUEST['cancelar'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexAplicacionFinal.php'); 
    exit();
}

//Creamos e inicializamos las variables imprescindibles para este ejercicio
$entradaOK = true; //Variable que nos indica que todo va bien
//Array donde recogemos los mensajes de error
$aErrores = [
    'T02_DescDepartamento' => '',
    'T02_VolumenDeNegocio' => ''
    ];

/*
 * Recuperamos el código del departamento seleccionado anteriormente por medio de una variable de sesión
 * Y usando el metodo 'buscaDepartamentoPorCod' de la clase 'DepartamentoPDO' recuperamos el objeto completo
 */
$oDepartamentoSeleccionado = DepartamentoPDO::buscaDepartamentosPorDesc($_SESSION['codDepartamentoActual']);

// Almaceno la información del departamento actual en las siguiente variables, para mostrarlas en el formulario
if ($oDepartamentoSeleccionado) {
    $codDepartamentoAEditar = $oDepartamentoSeleccionado->get_CodDepartamento();
    $descripcionDepartamentoAEditar = $oDepartamentoSeleccionado->get_DescDepartamento();
    $fechaCreacionDepartamentoAEditar = $oDepartamentoSeleccionado->get_FechaCreacionDepartamento();
    $volumenNegocioAEditar = $oDepartamentoSeleccionado->get_VolumenDeNegocio();
}

//Cargar valores por defecto en los campos del formulario
//Para cada campo del formulario: Validar entrada y actuar en consecuencia
if (isset($_REQUEST['enviar'])) {
    //Valido la entrada de descripcion departamento
    $aErrores = [
        'T02_DescDepartamento' => validacionFormularios::comprobarAlfabetico($_REQUEST['T02_DescDepartamento'], 255, 1, 0),
        'T02_VolumenDeNegocio' => validacionFormularios::comprobarFloat($_REQUEST['T02_VolumenDeNegocio'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, 1)
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
if ($entradaOK) {
    //modificamos el departamento con el metodo modificar
    DepartamentoPDO::modificaDepartamento($_SESSION['codDepartamentoActual'], $_REQUEST['T02_DescDepartamento'], $_REQUEST['T02_VolumenDeNegocio']);
}
require_once $view['layout'];