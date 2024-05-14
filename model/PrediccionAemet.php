<?php

/**
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

