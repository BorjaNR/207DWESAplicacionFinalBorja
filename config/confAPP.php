<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 17/04/2024
*/
require_once 'core/231018libreriaValidacion.php';
require_once 'model/DB.php';
require_once 'model/DBPDO.php';
require_once 'model/ErrorApp.php';
require_once 'model/Usuario.php';
require_once 'model/UsuarioDB.php';
require_once 'model/UsuarioPDO.php';
require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';
require_once 'model/Vehiculo.php';
require_once 'model/VehiculoPDO.php';
require_once 'model/REST.php';

$controller = [
    'inicioPublico' => 'controller/cInicioPublico.php',
    'login' => 'controller/cLogin.php',
    'inicioPrivado' => 'controller/cInicioPrivado.php',
    'detalle' => 'controller/cDetalle.php',
    'wip' => 'controller/cWIP.php',
    'error' => 'controller/cError.php',
    'registro' => 'controller/cRegistro.php',
    'rest' => 'controller/cREST.php',
    'mto_departamento' => 'controller/cMtoDepartamento.php',
    'editarDepartamento' => 'controller/cConsultarModificarDepartamento.php'
];

$view = [
    'layout' => 'view/Layout.php',
    'inicioPublico' => 'view/vInicioPublico.php',
    'login' => 'view/vLogin.php',
    'inicioPrivado' => 'view/vInicioPrivado.php',
    'detalle' => 'view/vDetalle.php',
    'wip' => 'view/vWIP.php',
    'error' => 'view/vError.php',
    'registro' => 'view/vRegistro.php',
    'rest' => 'view/vREST.php',
    'mto_departamento' => 'view/vMtoDepartamento.php',
    'editarDepartamento' => 'view/vConsultarModificarDepartamento.php'
];
