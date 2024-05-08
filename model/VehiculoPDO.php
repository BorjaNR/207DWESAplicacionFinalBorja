<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 07/05/2024
 */
class VehiculoPDO {

    public static function buscarModeloVehiculo($modelo, $orden) {
// Preparamos y ejecutamos la consulta
        $consulta = "SELECT * FROM T10_Vehiculo WHERE T10_Modelo LIKE '%$modelo%' ORDER BY T10_Modelo $orden";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta);
//Comprueba que haya resultado de la consulta
        if ($resultadoConsulta) {
//Recorre el resultado de la consulta guardandolo en el objeto vehiculo
            while ($oVehiculo = $resultadoConsulta->fetchObject()) {

//Creamos un nuevo Vehiculo a partir de los datos que contiene $oVehiculo metiendolos en un array asociativo siendo la clave la matricula 
                $aVehiculos[$oVehiculo->T10_Matricula] = new Vehiculo(
                        $oVehiculo->T10_Matricula,
                        $oVehiculo->T10_Modelo,
                        $oVehiculo->T10_FechaCompra,
                        $oVehiculo->T10_NumPuertas,
                        $oVehiculo->T10_Color,
                        $oVehiculo->T10_Valor,
                        $oVehiculo->T10_FechaBaja);
            }

//Devolvemos un array con los Vehiculos
            return $aVehiculos;

//En el caso de que la consulta no se realice	
        } else {

//Devolvemos false
            return false;
        }
    }

    public static function buscarVehiculoPorMatricula($matricula) {
        $consulta = "SELECT * FROM T10_Vehiculo WHERE T10_Matricula= '$matricula';";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta);
// Obtener como array asociativo
        $oVehiculo = $resultadoConsulta->fetchObject();
        if ($oVehiculo) {
// Devolvemos el array asociativo
            return new Vehiculo(
                    $oVehiculo->T10_Matricula,
                    $oVehiculo->T10_Modelo,
                    $oVehiculo->T10_FechaCompra,
                    $oVehiculo->T10_NumPuertas,
                    $oVehiculo->T10_Color,
                    $oVehiculo->T10_Valor,
                    $oVehiculo->T10_FechaBaja);
        } else {
            return false;
        }
    }

    public static function editarVehiculo($matricula, $modelo, $numPuertas, $color, $valor) {
        $consulta = "UPDATE T10_Vehiculo SET T10_Modelo = '$modelo',T10_NumPuertas = '$numPuertas',T10_Color = '$color', T10_Valor = '$valor' WHERE T10_Matricula = '$matricula'";
        return DBPDO::ejecutaConsulta($consulta);
    }

    public static function eliminarVehiculo($matricula) {
        $consulta = "DELETE FROM T10_Vehiculo WHERE T10_Matricula= '$matricula';";
        if (DBPDO::ejecutaConsulta($consulta)) {
            return true;
        } else {
            return false;
        }
    }

    public static function añadirVehiculo($matricula, $modelo, $fechaCompra, $numPuertas, $color, $valor) {
        $consulta = "INSERT INTO T10_Vehiculo VALUES ('$matricula','$modelo', '$fechaCompra', '$numPuertas', ' $color', '$valor',NULL);";

        if (DBPDO::ejecutaConsulta($consulta)) {
            return new Vehiculo($matricula, $modelo, $fechaCompra, $numPuertas, $color, $valor, NULL);
        } else {
            return false;
        }
    }

    public static function agregarFechaBaja($matricula) {
        $consulta = "UPDATE T10_Vehiculo SET T10_FechaBaja = NOW() WHERE T10_Matricula = '$matricula'";
        return DBPDO::ejecutaConsulta($consulta);
    }

    public static function eliminarFechaBaja($matricula) {
        $consulta = "UPDATE T10_Vehiculo SET T10_FechaBaja = NULL WHERE T10_Matricula = '$matricula'";
        return DBPDO::ejecutaConsulta($consulta);
    }
}
