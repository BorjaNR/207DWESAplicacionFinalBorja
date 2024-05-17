<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 16/05/2024
 */
//Comprobamos si pulsa el boton volver
if (isset($_REQUEST['cancelar'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexAplicacionFinal.php'); 
    exit();
}

$oDepartamentoSeleccionado = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoActual']);

// Almaceno la información del departamento actual en este array, para mostrarlas en el formulario
if ($oDepartamentoSeleccionado) {
    $avConsultarModificarDepartamento = [
        'codDepartamento' => $oDepartamentoSeleccionado->getCodDepartamento(),
        'descDepartamento' => $oDepartamentoSeleccionado->getDescDepartamento(),
        'fechaCreacion' => $oDepartamentoSeleccionado->getFechaCreacionDepartamento(),
        'volumen' => $oDepartamentoSeleccionado->getVolumenDeNegocio()
    ];
}

if (isset($_REQUEST['enviar'])) {
    //modificamos el departamento con el metodo modificar
    DepartamentoPDO::eliminaDepartamento($_SESSION['codDepartamentoActual']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['paginaAnterior'] = '';
    header('Location: indexAplicacionFinal.php'); 
}

require_once $view['layout'];