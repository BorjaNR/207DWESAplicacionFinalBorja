<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 08/05/2024
 */

class REST{
    const apikeyNASA = 'GnVVT40hqgzJrrRtsv5y2iy15w2fDFNqM8CLOK7s';

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

}

