<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 06/05/2024
 */
//Si le da al boton volver vuelve a la pagina de inicio privado
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    $_SESSION['paginaAnterior'] = "";
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

// Estructura del botón borar Departamento, si el usuario pulsa el botón del icono de una 'papelera'
if (isset($_REQUEST['borrar'])) {
    $_SESSION['codDepartamentoActual'] = $_REQUEST['borrar']; // Almaceno en una variable de sesión el Codigo del Departamento Seleccionado
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'eliminarDepartamento';
    header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
    exit;
}

// Estructura del botón añadir Departamento, si el usuario pulsa el botón de añadir departamento
if (isset($_REQUEST['añadir'])) {
    $_SESSION['codDepartamentoActual'] = $_REQUEST['añadir']; // Almaceno en una variable de sesión el Codigo del Departamento Seleccionado
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'añadirDepartamento';
    header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
    exit;
}

// Estructura del botón baja Departamento, si el usuario pulsa el botón de añadir departamento
if (isset($_REQUEST['bajaLogica'])) {
    $_SESSION['codDepartamentoActual'] = $_REQUEST['bajaLogica']; // Almaceno en una variable de sesión el Codigo del Departamento Seleccionado
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'bajaLogica';
    header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
    exit;
}

// Si la variable no esta declarada le asigno un valor por defecto
if (!isset($_SESSION['numPaginacionDepartamentos'])) {
    $_SESSION['numPaginacionDepartamentos'] = 1;
}

define("ESTADO_TODOS", 0);
define("ESTADO_ALTAS", 1);
define("ESTADO_BAJAS", 2);

// Si la variable no esta declarada le asigno un valor por defecto
if (!isset($_SESSION['criterioBusquedaDepartamentos']['estado'])) {
    $_SESSION['criterioBusquedaDepartamentos']['estado'] = ESTADO_TODOS;
}


// Estructura del botón rehabilitar Departamento, si el usuario pulsa el botón de añadir departamento
if (isset($_REQUEST['rehabilitar'])) {
    $_SESSION['codDepartamentoActual'] = $_REQUEST['rehabilitar']; // Almaceno en una variable de sesión el Codigo del Departamento Seleccionado
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'rehabilitacion';
    header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
    exit;
}

/*
 * Por medio del método 'buscaDepartamentosTotales' de la clase 'DepartamentoPDO' cuento todos los Departamentos 
 * que le pido según los parametros y los almaceno en una variable.
 * 
 * Divido por 5 para obtener el número total de páginas, ya que cada página tiene 5 resultados.
 */
$iDepartamentosTotales = DepartamentoPDO::buscaDepartamentosTotales($_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? '', $_SESSION['criterioBusquedaDepartamentos']['estado']) / 5;

if(isset($_REQUEST['paginaPrimera'])){ //Si el usuario pulsa el boton de paginaPrimera
    $_SESSION['numPaginacionDepartamentos'] = 1; //Le situo en la primera pagina
    header('Location: indexAplicacionFinal.php');
    exit;
}
if(isset($_REQUEST['paginaAnterior']) && $_SESSION['numPaginacionDepartamentos'] >= 2){ //Si el usuario pulsa el boton de paginaAnterior
    $_SESSION['numPaginacionDepartamentos']--; //Le situo una pagina mas atras
    header('Location: indexAplicacionFinal.php');
    exit;
}
if(isset($_REQUEST['paginaSiguiente']) && $_SESSION['numPaginacionDepartamentos'] < $iDepartamentosTotales){ //Si el usuario pulsa el boton de paginaSiguiente
    $_SESSION['numPaginacionDepartamentos']++; //Le situo una pagina mas adelante
    header('Location: indexAplicacionFinal.php');
    exit;
}
if(isset($_REQUEST['paginaUltima'])){ //Si el usuario pulsa el boton de paginaUltima
    $_SESSION['numPaginacionDepartamentos'] = ceil($iDepartamentosTotales); // Redondeo hacia arriba el número
    header('Location: indexAplicacionFinal.php');
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
    
    switch ($_REQUEST['estado']){ //Guardo el estado que ha seleccionado el usuario en el filtrado de la busqueda
        case 'todos':
            $sEstado = ESTADO_TODOS;
            break;
        case 'altas':
            $sEstado = ESTADO_ALTAS;
            break;
        case 'bajas':
            $sEstado = ESTADO_BAJAS;
            break;
    }
    // El valor de $sEstado son una constantes que valen (0-1-2)
    $_SESSION['numPaginacionDepartamentos'] = 1;
    $_SESSION['criterioBusquedaDepartamentos']['estado'] = $sEstado; // Guardo el valor del estado en la sesión
}

/*
 * Por medio del método 'buscaDepartamentosTotales' de la clase 'DepartamentoPDO' cuento todos los Departamentos 
 * que le pido según los parametros y los almaceno en una variable.
 * 
 * Divido por 5 para obtener el número total de páginas, ya que cada página tiene 4 resultados.
 */
$iDepartamentosTotales = DepartamentoPDO::buscaDepartamentosTotales($_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] ?? '', $_SESSION['criterioBusquedaDepartamentos']['estado']) / 5;

//Array para guardar el contenido de un departamento
$aDepartamentoVista = [];

//Contador para los registros
$numeroDeRegistrosConsulta = 0;

/**
 * Inicializamos el arrayDepartamentos buscados llamando al metodo buscaDepartamtosPorDesc de la clase DepartamentoPDO
 * Este metodo Realiza una consulta filtrando por descripcion de deparamentos y devuleve su resultado
 */
//$aDepartamentosBuscados = DepartamentoPDO::buscaDepartamentosPorDesc($_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] ?? '');

/*
 * Por medio del método 'buscaDepartamentosPorEstado' de la clase 'DepartamentoPDO' busco todos los Departamentos
 * con los siguientes parametros. 
 * La descripción si esta declarada si no vacío, el estado esta declarado por defecto y el número de paginación también.
 * 
 * Le restamos 1 a la variable de '$_SESSION['numPaginacionDepartamentos']' para indicar el indice 0 de la paginación y que así nos muestre los 4 primeros resultado,
 * si no hicieramos esto nos mostraría a partir de los 5 siguiente, porque es lo que le indico en el método.
 */
$aDepartamentosBuscados = DepartamentoPDO::buscaDepartamentosPorEstado($_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] ?? '', $_SESSION['criterioBusquedaDepartamentos']['estado'], $_SESSION['numPaginacionDepartamentos']-1); 
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
