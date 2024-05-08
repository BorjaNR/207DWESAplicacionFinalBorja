<?php

/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 07/05/2024
 */
class Vehiculo {

    /**
     * Matricula del vehiculo
     * @var string
     */
    private $matricula;

    /**
     * Modelo del vehiculo
     * @var string
     */
    private $modelo;

    /**
     * Fechad de compra
     * @var DateTime
     */
    private $fechaCompra;

    /**
     * Numero de puertas
     * @var int
     */
    private $numPuertas;

    /**
     * Color del vehiculo
     * @var string
     */
    private $color;

    /**
     * Valor del vehiculo
     * @var float
     */
    private $valor;

    /**
     * Fecha de bajas
     * @var DateTime
     */
    private $fechaBaja;

    /**
     * Contructor de la clase Departamento
     * 
     * @param string $matricula
     * @param string $modelo
     * @param DateTime $fechaCompra
     * @param int $numPuertas
     * @param string $color
     * @param float $valor
     * @param DateTime $fechaBaja
     */
    public function __construct($matricula, $modelo, $fechaCompra, $numPuertas, $color, $valor, $fechaBaja) {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->fechaCompra = $fechaCompra;
        $this->numPuertas = $numPuertas;
        $this->color = $color;
        $this->valor = $valor;
        $this->fechaBaja = $fechaBaja;
    }

    /**
     * Obtiene la matricula de Vehiculo
     *
     * @return string La matricula de vehiculo
     */
    public function getMatricula() {
        return $this->matricula;
    }

    /**
     * Obtiene el modelo de Vehiculo
     *
     * @return string El modelo de vehiculo
     */
    public function getModelo() {
        return $this->modelo;
    }

    /**
     * Obtiene la fecha de compra de Vehiculo
     *
     * @return DateTime La fecha de compra de vehiculo
     */
    public function getFechaCompra() {
        return $this->fechaCompra;
    }

    /**
     * Obtiene el numero de puertas de Vehiculo
     *
     * @return int El numero de puertas de vehiculo
     */
    public function getNumPuertas() {
        return $this->numPuertas;
    }

    /**
     * Obtiene el color de Vehiculo
     *
     * @return string El color de vehiculo
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * Obtiene el valor de Vehiculo
     *
     * @return float El valor de vehiculo
     */
    public function getValor() {
        return $this->valor;
    }

    /**
     * Obtiene la fecha de baja de Vehiculo
     *
     * @return string La fecha de baja de vehiculo
     */
    public function getFechaBaja() {
        return $this->fechaBaja;
    }

    /**
     * Establece la matricula de Vehiculo
     *
     * @param string $matricula La nueva matricula del Vehiculo.
     */
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    /**
     * Establece el modelo de Vehiculo
     *
     * @param string $modelo El nuevo modelo del Vehiculo.
     */
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    /**
     * Establece la fecha de compra de Vehiculo
     *
     * @param DateTime $fechaCompra La nueva fecha de compra del Vehiculo.
     */
    public function setFechaCompra($fechaCompra) {
        $this->fechaCompra = $fechaCompra;
    }

    /**
     * Establece el numero de puertas de Vehiculo
     *
     * @param int $numPuertas El nuevo numero de puertas del Vehiculo.
     */
    public function setNumPuertas($numPuertas) {
        $this->numPuertas = $numPuertas;
    }

    /**
     * Establece el color de Vehiculo
     *
     * @param string $color El nuevo color del Vehiculo.
     */
    public function setColor($color) {
        $this->color = $color;
    }

    /**
     * Establece el valor de Vehiculo
     *
     * @param float $valor El nuevo valor del Vehiculo.
     */
    public function setValor($valor) {
        $this->valor = $valor;
    }

    /**
     * Establece la fecha de baja de Vehiculo
     *
     * @param DateTime $fechaBaja La nueva fecha de baja del Vehiculo.
     */
    public function setFechaBaja($fechaBaja) {
        $this->fechaBaja = $fechaBaja;
    }
}
