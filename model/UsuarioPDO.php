<?php

/**
 * @author Borja Nueñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */
class UsuarioPDO implements UsuarioDB {

    public static function validarUsuario($codUsuario, $password) {
        $oUsuario = null;
        $consulta = <<<CONSULTA
                        SELECT * FROM T01_Usuario 
                        WHERE T01_CodUsuario = '{$codUsuario}' 
                        AND T01_Password = SHA2('{$codUsuario}{$password}', 256);
                    CONSULTA;
        // Ejecuta la consulta
        $resultado = DBPDO::ejecutaConsulta($consulta);
        // Si el resultado de la consulta tiene valor guarda el resultado en el objeto oUsuario
        if ($resultado->rowCount() > 0) {
            $oResultado = $resultado->fetchObject();
            // Instancia un nuevo objeto Usuario con todas sus propiedades
            if ($oResultado) {
                $oUsuario = new Usuario(
                        $oResultado->T01_CodUsuario,
                        $oResultado->T01_Password,
                        $oResultado->T01_DescUsuario,
                        $oResultado->T01_NumConexiones,
                        $oResultado->T01_FechaHoraUltimaConexion,
                        $oResultado->T01_FechaHoraUltimaConexionAnterior = null,
                        $oResultado->T01_Perfil
                );
            }
        }
        //Devuelve el objeto usuario
        return $oUsuario;
    }

    public static function registrarUltimaConexion($oUsuario) {

        $oUsuario->setnumAcceso($oUsuario->getnumAcceso() + 1);
        $oUsuario->setfechaHoraUltimaConexionAnterior($oUsuario->getfechaHoraUltimaConexion());

        //Realizamos un uptade
        $consultaActualizacionFechaUltimaConexion = <<<CONSULTA
            UPDATE T01_Usuario 
            SET T01_NumConexiones=T01_NumConexiones+1, T01_FechaHoraUltimaConexion=now() 
            WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}';
        CONSULTA;
        $resultado = DBPDO::ejecutaConsulta($consultaActualizacionFechaUltimaConexion);
        return $oUsuario;
    }

    public static function validarCodNoExiste($codUsuario) {
        $oUsuario = null;
        $consultaCodUsuario = <<<CONSULTA
            SELECT * FROM T01_Usuario 
            WHERE T01_CodUsuario = '{$codUsuario}' ;
        CONSULTA;

        $resultado = DBPDO::ejecutaConsulta($consultaCodUsuario);
        if ($resultado) {
            $oResultado = $resultado->fetchObject();
            if($oResultado){
                $oUsuario = new Usuario(
                        $oResultado->T01_CodUsuario,
                        $oResultado->T01_Password,
                        $oResultado->T01_DescUsuario,
                        $oResultado->T01_NumConexiones,
                        $oResultado->T01_FechaHoraUltimaConexion,
                        $oResultado->T01_FechaHoraUltimaConexionAnterior = null,
                        $oResultado->T01_Perfil
                );
            }
        } else {
            return false;
        }
        return $oUsuario;
    }

    public static function altaUsuario($codUsuario, $password, $descUsuario) {
        $consultaCrearUsuario = <<<CONSULTA
            INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) 
            VALUES ("{$codUsuario}", SHA2("{$codUsuario}{$password}", 256), "{$descUsuario}", 1, now());
        CONSULTA;

        if (DBPDO::ejecutaConsulta($consultaCrearUsuario)) {
            return new Usuario($codUsuario, $password, $descUsuario, 1, date('Y-m-d H:i:s'), null, 'usuario');
        } else {
            return false;
        }
    }
    
    /**
     * 
     * Metodo que nos permite modificar la descripción de un Usuario existente en la BD
     * 
     * @param object $oUsuario Objeto usuario
     * @param string $descUsuario La nueva descripción
     * 
     * @return boolean | object Un objeto usuario, si el usuario existe y se puede cambiar, de lo contrario un boolean a 'false'
     */
    public static function modificarUsuario($oUsuario, $descUsuario) {
       $consultaModificarUsuario = <<<CONSULTA
            UPDATE T01_Usuario SET T01_DescUsuario="{$descUsuario}" WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        CONSULTA;

        $oUsuario->setDescUsuario($descUsuario);

        if (DBPDO::ejecutaConsulta($consultaModificarUsuario)) { // Ejecuto la consulta
            return $oUsuario; // Devuelvo un objeto Usuario
        } else {
            return false;
        }
    }
    
    public static function borrarUsuario($codUsuario) {
        //CONSULTA SQL - DELETE
        $consultaEliminarUsuario = <<<CONSULTA
            DELETE FROM T01_Usuario WHERE T01_CodUsuario = '{$codUsuario}';
        CONSULTA;
        return DBPDO::ejecutaConsulta($consultaEliminarUsuario);
    }
    
     public static function cambiarPassword($oUsuario, $password) {
        //Consulta SQL para modificar la password de un usuario
        $consultaModificarPassword = <<<CONSULTA
            UPDATE T01_Usuario SET T01_Password=SHA2("{$oUsuario->getCodUsuario()}{$password}", 256) WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        CONSULTA;
        $hashPassword = hash("sha256", ($oUsuario->getCodUsuario() . $password));
        $oUsuario->setPassword($hashPassword);

        if (DBPDO::ejecutaConsulta($consultaModificarPassword)) {
            return $oUsuario;
        } else {
            return false;
        }
    }
}
