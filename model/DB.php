<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */

/**
 * Class DBPDO
 *
 * Fichero que contiene la intefaz DBPDO
 *
 * PHP version 8.1
 */

interface DB {

    /**
     * Funcion ejecutaConsulta
     * 
     * Funcion Ejecuta las sentencias SQL recibidas
     *
     * @param string $sentenciaSQL Cadena donde se almacena la senetenciasql.
     * @param string $parametros Parametros que va asecibir la consulta.
     */
    public static function ejecutaConsulta($sentenciaSQL, $parametros = null);
}

