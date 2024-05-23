<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 20/05/2024
 */

/*
 * Recuperamos el código del departamento por medio de una variable de sesión y 
 * buscamos el Departamento usando la clase 'buscaDepartamentoPorCod' de la clase DepartamentoPDO
 */
$oDepartamentoSeleccionado = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoActual']);

/*
 * Comrpbamos que la fecha baja no sea null y
 * damos de alta al departameno
 */
if(!is_null($oDepartamentoSeleccionado->getFechaBajaDepartamento())){
    DepartamentoPDO::rehabilitacionDepartamento($_SESSION['codDepartamentoActual']);
}

$_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
header('Location: indexAplicacionFinal.php'); // Redirecciono al index de la APP
exit;

require_once $view['layout'];
