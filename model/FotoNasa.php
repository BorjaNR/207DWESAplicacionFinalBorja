<?php

/**
 * Class FotoNasa
 *
 * Fichero que contiene la clase FotoNasa, que contiene un contructor de una foto de la nasa y su titulo y las funciones get y set de cada atributo de la clase
 * PHP version 8.1
 * 
 */

/** 
 * Clase de FotoNasa
 * 
 * Clase de FotoNasa
 * 
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 13/05/2024
 */

class FotoNasa{
    private $titulo;
    private $foto;
    
    public function __construct($titulo, $foto) {
        $this->titulo = $titulo;
        $this->foto = $foto;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function getFoto() {
        return $this->foto;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }
    
    public function setFoto($foto): void {
        $this->foto = $foto;
    }
}

