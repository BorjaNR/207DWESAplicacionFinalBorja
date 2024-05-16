<?php
/**
 * Class DBPDO
 *
 * Fichero que contiene la clase DBPDO, que contiene una funcion para ejecutar cualquier consulta
 * PHP version 8.1
 * 
 */

/** 
 * Clase de ejecutar consulta
 * 
 * Clase de ejecutar consulta que contiene la funcion para ejecutar cualquier consulta sql
 * 
 * @author Borja Nueñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 * 
 */

class DBPDO implements DB {
    /**
     * 
     * Funcion ejecutaConsulta
     * 
     * Funcion que ejecuta cualquier consulta sql
     * 
     * @param string $sentenciaSQL Variable donde se almacena una consulta sql
     * @param string $parametros Variable donde se almacenan los parametros de la consulta
     * @return string Devuelve el resultado de la consulta si es correcta y si no el error
     * 
     */
    public static function ejecutaConsulta($sentenciaSQL, $parametros = null) {
        try {
            // Instanciamos un objeto PDO y establecemos la conexión
            $miDB = new PDO(DSN, USERNAME, PASSWORD);
            // Prepara la consulta
            $consultaPreparada = $miDB->prepare($sentenciaSQL);
            // EjecuresultadoConsultata la consulta
            $consultaPreparada->execute($parametros);
            // Devuelvo el resultado de la consulta
            return $consultaPreparada;
            // Código que se ejecuta si hay algún error
        } catch (PDOException $excepcion) {
            $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'error';
            $_SESSION['error'] = new ErrorApp($excepcion->getCode(), $excepcion->getMessage(), $excepcion->getFile(), $excepcion->getLine());
            header('Location:indexAplicacionFinal.php');
            exit;
        } finally {
            // Cierra la conexión con la BD
            unset($miDB);
        }
    }
}