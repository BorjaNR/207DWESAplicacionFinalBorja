<?php
/**
 * Class Departamento
 *
 * Fichero que contiene la clase Departamento, que contiene un contructor de Departamento y las funciiones get y set de cada atributo de la clase
 * PHP version 8.1
 * 
 */

/** 
 * Clase de Departamento
 * 
 * Clase de Departamento
 * 
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 06/05/2024
 */
class Departamento {

    /**
     * Código de Departamento
     * @var string
     */
    private $codDepartamento;

    /**
     * Descripción de Departamento
     * @var string
     */
    private $descDepartamento;

    /**
     * Fecha de Creación de Departamento
     * @var DateTime
     */
    private $fechaCreacionDepartamento;

    /**
     * Volumen de Negocio
     * @var double
     */
    private $volumenDeNegocio;

    /**
     * Fecha de Baja de Departamento
     * @var DateTime
     */
    private $fechaBajaDepartamento;

    /**
     * Contructor de la clase Departamento
     * 
     * Contructor de la clase Departamento
     * 
     * @param string $codDepartamento
     * @param string $descDepartamento
     * @param DateTime $fechaCreacionDepartamento
     * @param double $volumenDeNegocio
     * @param DateTime $fechaBajaDepartamento
     */
    public function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento = NULL) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    /**
     * Funcion getCodDepartamento
     * 
     * Obtiene el código de Departamento.
     *
     * @return string El código de Departamento.
     */
    public function getCodDepartamento() {
        return $this->codDepartamento;
    }

    /**
     * Funcion getDescDepartamento
     * 
     * Obtiene la descripción de Departamento.
     *
     * @return string La descripción de Departamento.
     */
    public function getDescDepartamento() {
        return $this->descDepartamento;
    }

    /**
     * Funcion getFechaCreacionDepartamento
     * 
     * Obtiene la fecha de creación de Departamento.
     *
     * @return DateTime La fecha de creación de Departamento.
     */
    public function getFechaCreacionDepartamento() {
        return $this->fechaCreacionDepartamento;
    }

    /**
     * Funcion getVolumenDeNegocio
     * 
     * Obtiene el Volumen de Negocio de Departamento.
     *
     * @return float El volumne de negocio.
     */
    public function getVolumenDeNegocio() {
        return $this->volumenDeNegocio;
    }

    /**
     * Funcion getFechaBajaDepartamento
     * 
     * Obtiene la fecha de baja de Departamento.
     *
     * @return DateTime La fecha de baja de Departamento.
     */
    public function getFechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }

    /**
     * Funcion setCodDepartamento
     * 
     * Establece el código de Departamento
     *
     * @param string $codDepartamento El nuevo código del Departamento.
     */
    public function setCodDepartamento($codDepartamento) {
        $this->codDepartamento = $codDepartamento;
    }

    /**
     * Funcion setDescDepartamento
     * 
     * Establece la descripción de Departamento
     *
     * @param string $descDepartamento La nueva descripción del Departamento.
     */
    public function setDescDepartamento($descDepartamento) {
        $this->descDepartamento = $descDepartamento;
    }

    /**
     * Funcion setFechaCreacionDepartamento
     * 
     * Establece la fecha de creación de Departamento
     *
     * @param DateTime $fechaCreacionDepartamento La nueva fecha de creación del Departamento.
     */
    public function setFechaCreacionDepartamento($fechaCreacionDepartamento) {
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
    }

    /**
     * Funcion setVolumenDeNegocio
     * 
     * Establece el volumen de negocio del Departamento
     *
     * @param double $volumenDeNegocio El nuevo volumen de negocio del Departamento.
     */
    public function setVolumenDeNegocio($volumenDeNegocio) {
        $this->volumenDeNegocio = $volumenDeNegocio;
    }

    /**
     * Funcion setFechaBajaDepartamento
     * 
     * Establece la fecha de baja de Departamento
     *
     * @param DateTime $fechaBajaDepartamento La nueva fecha de baja del Departamento.
     */
    public function setFechaBajaDepartamento($fechaBajaDepartamento) {
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }
}

