<?php

/**
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

