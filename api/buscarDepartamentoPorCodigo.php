<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 14/05/2024
 */

require_once '../config/confDBPDO.php';
require_once '../model/DB.php';
require_once '../model/DBPDO.php';
require_once '../model/Departamento.php';
require_once '../model/DepartamentoPDO.php';

//Creamos e inicializamos las variables imprescindibles para este ejercicio
$entradaOK = true; //Variable que nos indica que todo va bien

// Inicializo las variables para la lógica
$aErrores = [
   'codigo' => [],
   'mensaje' => []
];

//Controlo que he recibido el codigo departamento
if (isset($_REQUEST['codDepartamento'])) {
    /*
    * Recuperamos el código del departamento seleccionado anteriormente por medio de una variable de sesión
    * Y usando el metodo 'buscaDepartamentoPorCod' de la clase 'DepartamentoPDO' recuperamos el objeto completo
    */
    $oDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['codDepartamento']);
    
    if($oDepartamento){
        $aDepartamento = [
            'CodDepartamento' => $oDepartamento->getCodDepartamento(),
            'DescDepartamento' => $oDepartamento->getDescDepartamento(),
            'FechaCreacion' => $oDepartamento->getFechaCreacionDepartamento(),
            'Volumen' => $oDepartamento->getVolumenDeNegocio(),
            'FechaBaja' => $oDepartamento->getFechaBajaDepartamento()
        ];
    } else {
      //Muestro los errores correspondientes
      $aErrores['codigo'] = '404';
      $aErrores['mensaje'] = 'No se ha encontrado ningun departamento con ese codigo';
      $entradaOK = false;
    }
} else {
    //Muestro los errores correspondientes
    $aErrores['codigo'] = '404';
    $aErrores['mensaje'] = 'No ha introducido un codigo de departamento';
    $entradaOK = false; 
}
//Si esta todo bien codifico el arrray en un json y si no codifico el array de errores en otro json
if ($entradaOK) { 
    echo json_encode($aDepartamento, JSON_PRETTY_PRINT); 
} else { 
    echo json_encode($aErrores, JSON_PRETTY_PRINT);
}