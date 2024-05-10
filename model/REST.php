<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 08/05/2024
 */

class REST{
    const apikeyNASA = 'GnVVT40hqgzJrrRtsv5y2iy15w2fDFNqM8CLOK7s';
    const apikeyAEMET = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJib3JqYW5yZGF3MUBnbWFpbC5jb20iLCJqdGkiOiJkNzM4ZTY5YS04NGU4LTQ4ZmEtYTcxNC01M2FjYjI1MWRhOWIiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTcxNTI5MzA1OCwidXNlcklkIjoiZDczOGU2OWEtODRlOC00OGZhLWE3MTQtNTNhY2IyNTFkYTliIiwicm9sZSI6IiJ9.MxWlsfb1Ttm07i52Vj62NTJCfGEMmmYQoHizqpH-k38';

    public static function apiNasa($fecha)
    {
        try {
            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=" . self::apikeyNASA . "&date=$fecha");

            // Devolvemos el array devuelto por json_decode
            return json_decode($resultado, true);
        } catch (Exception $excepcion) {
            // devolvemos el mensaje de error
            return $excepcion->getMessage();
        }
    }

    public static function apiAemet($provincia) {
        try {
            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://opendata.aemet.es/opendata/api/prediccion/provincia/hoy/{$provincia}/?api_key=" . self::apikeyAEMET);
            
            // Devolvemos el array devuelto por json_decode
            $archivoApi = json_decode($resultado, true);
            
            if (isset($archivoApi)){
                $aResultadoArchivoAEMET['provincia'] = $archivoApi['datos'];
            }
        } catch (Exception $excepcion) {
            // devolvemos el mensaje de error
            return $excepcion->getMessage();
        }
    }
}
