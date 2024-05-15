<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 06/05/2024
 */
//Si le da al boton volver vuelve a la pagina de inicio privado
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] = "";
    header('Location: indexAplicacionFinal.php');
    exit();
}

// Estructura del botón editarDepartamento, si el usuario pulsa el botón del icono de un 'lapiz'
if (isset($_REQUEST['ConsultarModificarDepartamento'])) {
    $_SESSION['codDepartamentoActual'] = $_REQUEST['ConsultarModificarDepartamento']; // Almaceno en una variable de sesión el Codigo del Departamento Seleccionado
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'editarDepartamento';
    header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
    exit;
}

//Creamos e inicializamos las variables imprescindibles para este ejercicio
$entradaOK = true; //Variable que nos indica que todo va bien
//Array donde recogemos los mensajes de error
$aErrores = ['DescDepartamento'];
//Cargar valores por defecto en los campos del formulario
//Para cada campo del formulario: Validar entrada y actuar en consecuencia
if (isset($_REQUEST['enviar'])) {
    //Valido la entrada de descripcion departamento
    $aErrores = [
        'DescDepartamento' => validacionFormularios::comprobarAlfabetico($_REQUEST['DescDepartamento'], 255, 1, 0),
    ];
    //Recorremos los errores para ver si hay alguno
    foreach ($aErrores as $campo => $error) {
        if ($error == !null) {
            $entradaOK = false;
            //Limpiar campos malos
            $_REQUEST[$campo] = '';

            //Si ha dado un error la respuesta pasa a valer el valor que ha introducido el usuario
        } else {
            $aRespuestas['DescDepartamento'] = $_REQUEST['DescDepartamento'];
        }
    }
} else {
    $entradaOK = false;
}
if ($entradaOK) {
    $_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] = $_REQUEST['DescDepartamento'];
}

//Array para guardar el contenido de un departamento
$aDepartamentoVista = [];

//Contador para los registros
$numeroDeRegistrosConsulta = 0;

/**
 * Inicializamos el arrayDepartamentos buscados llamando al metodo buscaDepartamtosPorDesc de la clase DepartamentoPDO
 * Este metodo Realiza una consulta filtrando por descripcion de deparamentos y devuleve su resultado
 */
$aDepartamentosBuscados = DepartamentoPDO::buscaDepartamentosPorDesc($_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] ?? '');


// Ejecutando la declaración SQL
if ($aDepartamentosBuscados) {

    //Recorro el objeto del resultado que contiene un array
    foreach ($aDepartamentosBuscados as $aDepartamento) {

        //Hago uso del metodo array push para meter los valores en el array $aDepartamentos
        array_push($aDepartamentoVista, [
            //Guardo en el valor codDepartamento el codigo del departamento
            'codDepartamento' => $aDepartamento->getCodDepartamento(),
            //Guardo en el valor descDepartamento la descripcion del departamento
            'descDepartamento' => $aDepartamento->getDescDepartamento(),
            //Guardo en el valor fechaAlta la fecha de alta del departamento
            'fechaCreacionDep' => $aDepartamento->getFechaCreacionDepartamento(),
            //Guardo en el valor volumenNegocio el volumen de negocio del departamento
            'volumenDeNegocio' => $aDepartamento->getVolumenDeNegocio(),
            //Guardo en el valor fechaBaja la fecha de baja del departamento
            'fechaBajaDep' => !is_null($aDepartamento->getFechaBajaDepartamento()) ? $aDepartamento->getFechaBajaDepartamento() : ''
        ]);

        //Incremento el contador
        $numeroDeRegistrosConsulta++;
    }
} else {

    //Mostramos los errores
    $aErrores['DescDepartamento'] = "No existen departamentos con esa descripcion";
}

// Cargo la vista de 'Layout'
require_once $view['layout'];
