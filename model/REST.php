<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 08/05/2024
 */

class REST{
    const apikeyNASA = 'GnVVT40hqgzJrrRtsv5y2iy15w2fDFNqM8CLOK7s';
    const apikeyAEMET = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJib3JqYW5yZGF3MUBnbWFpbC5jb20iLCJqdGkiOiIzMTAzYzFhYS0xMGE0LTRkYmMtOWIzZC1kNjAzOGM5YzhmNjAiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTcxNTMyODUwOSwidXNlcklkIjoiMzEwM2MxYWEtMTBhNC00ZGJjLTliM2QtZDYwMzhjOWM4ZjYwIiwicm9sZSI6IiJ9.JrSGixzGg5PlLkx46Cp7h_u5Hh7neMONdqGm50n2T84';

    public static function apiNasa($fecha)
    {
        try {
            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=" . self::apikeyNASA . "&date=$fecha");

            // Devolvemos el array devuelto por json_decode
            $archivoApi = json_decode($resultado, true);
            
            //Compruebo que existe o no esta vacio el archivo y si no lo esta devuelvo un objeto y si no null
            if (isset($archivoApi)){
                $fotoNasa = new FotoNasa($archivoApi['title'], $archivoApi['url']);
                return $fotoNasa;
            }else{
                return null;
            }
        } catch (Exception $excepcion) {
            $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'error';
            $_SESSION['error'] = new ErrorApp($excepcion->getCode(), $excepcion->getMessage(), $excepcion->getFile(), $excepcion->getLine());
            header('Location:indexAplicacionFinal.php');
            exit;
        }
    }

    public static function apiAemet($provincia) {
        try {
            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://opendata.aemet.es/opendata/api/prediccion/provincia/hoy/{$provincia}/?api_key=" . self::apikeyAEMET);
            
            // Devolvemos el array devuelto por json_decode
            $archivoApi = json_decode($resultado, true);
            
            if (isset($archivoApi)){
                $prediccionAemet = new PrediccionAemet($archivoApi['datos']);
                return $prediccionAemet;
            }else{
                return null;
            }
        } catch (Exception $excepcion) {
            $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'error';
            $_SESSION['error'] = new ErrorApp($excepcion->getCode(), $excepcion->getMessage(), $excepcion->getFile(), $excepcion->getLine());
            header('Location:indexAplicacionFinal.php');
            exit;
        }
    }
    
    public static function apiBuscaDepartamentoPorCodigo($codDepartamentoEnCurso) {
        try{
           // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("http://daw207.isauces.local/207DWESAplicacionFinalBorja/api/buscarDepartamentoPorCodigo.php/?codDepartamento=".$codDepartamentoEnCurso);
            
            // Devolvemos el array devuelto por json_decode
            $archivoApi = json_decode($resultado, true);
            
            $resultado = null;
            if (isset($archivoApi)){
                if(!array_key_exists('codigo', $archivoApi)){
                    $resultado = new Departamento($archivoApi['CodDepartamento'],$archivoApi['DescDepartamento'],$archivoApi['FechaCreacion'],$archivoApi['Volumen'],$archivoApi['FechaBaja']);
                }else{
                   $aResultadoApiDepartamento['codigo'] = $archivoApi['codigo'];
                   $aResultadoApiDepartamento['error'] = $archivoApi['mensaje'];
                   $resultado = $aResultadoApiDepartamento;
                }
            }
            return $resultado;
        } catch (Exception $excepcion) {
            $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'error';
            $_SESSION['error'] = new ErrorApp($excepcion->getCode(), $excepcion->getMessage(), $excepcion->getFile(), $excepcion->getLine());
            header('Location:indexAplicacionFinal.php');
            exit;
        }
    }
}
