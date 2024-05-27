<?php

/**
 * Class PrediccionAemet
 *
 * Fichero que contiene la clase PrediccionAemet, que contiene un contructor de una prediccion meteorológica y su titulo y las funciones get y set de cada atributo de la clase
 * PHP version 8.1
 * 
 */

/** 
 * Clase de PrediccionAemet
 * 
 * Clase de PrediccionAemet
 *
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 13/05/2024
 */

class PrediccionAemet{
    private $prediccion;
    
    public function __construct($prediccion) {
        $this->prediccion = $prediccion;
    }
    
    public function getPrediccion() {
        return $this->prediccion;
    }

    public function setPrediccion($prediccion): void {
        $this->prediccion = $prediccion;
    }
}

