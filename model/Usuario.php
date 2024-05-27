<?php

/**
 * @author Borja Nueñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */
class Usuario {
    /**
     * @var string $codUsuario Codigo de usuario
    */
    private $codUsuario;
    
    /**
     * @var string $password Contraseña de usuario
    */
    private $password;
    
    /**
     * @var string $descUsuario Descripción de usuario de usuario
    */
    private $descUsuario;
    
    /**
     * @var int $numAcceso Número de veces que ha accedido
    */
    private $numAcceso;
    
    /**
     * @var DateTime $fechaHoraUltimaConexion Fecha y hora de la ultima conexion
    */
    private $fechaHoraUltimaConexion;
    
    /**
     * @var DateTime $fechaHoraUltimaConexionAnterior Fecha y hora de la ultima conexion anterior
    */
    private $fechaHoraUltimaConexionAnterior;
    
    /**
     * @var string $perfil Perfil del usuario
    */
    private $perfil;
    
    /**
     * Contructor de la clase Usuario
     * 
     * Contructor de la clase Usuario
     * 
     * @param string $codUsuario
     * @param string $password
     * @param string $descUsuario
     * @param int $numAcceso
     * @param DateTime $fechaHoraUltimaConexion
     * @param DateTime $fechaHoraUltimaConexionAnterior
     * @param string $perfil
     */

    public function __construct($codUsuario, $password, $descUsuario, $numAcceso, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAcceso = $numAcceso;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        $this->perfil = $perfil;
    }
    
    /**
     * Funcion getCodUsuario
     * 
     * Obtiene el código de Usuario
     *
     * @return string El código de Usuario.
     */
    public function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * Funcion getPassword
     * 
     * Obtiene el password de Usuario
     *
     * @return string El password de Usuario.
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Funcion getDescUsuario
     * 
     * Obtiene la descripción de Usuario
     *
     * @return string La descripción de Usuario.
     */
    public function getDescUsuario() {
        return $this->descUsuario;
    }

    /**
     * Funcion getNumAcceso
     * 
     * Obtiene el numero de veces que accede el Usuario
     *
     * @return int El numero de vecea que accede el Usuario.
     */
    public function getNumAcceso() {
        return $this->numAcceso;
    }

    /**
     * Funcion getFechaHoraUltimaConexion
     * 
     * Obtiene la fecha y hora de la ultima conexión de Usuario
     *
     * @return DateTime La fecha y hora de la ultima conexión de Usuario.
     */
    public function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    /**
     * Funcion getFechaHoraUltimaConexionAnterior
     * 
     * Obtiene la fecha y hora de la ultima conexión anterior de Usuario
     *
     * @return DateTime La fecha y hora de la ultima conexión anterior de Usuario.
     */
    public function getFechaHoraUltimaConexionAnterior() {
        return $this->fechaHoraUltimaConexionAnterior;
    }

    /**
     * Funcion getPerfil
     * 
     * Obtiene el perffil de Usuario
     *
     * @return string El perfil de Usuario.
     */
    public function getPerfil() {
        return $this->perfil;
    }

    /**
     * Funcion setCodUsuario
     * 
     * Establece el código de Usuario
     *
     * @param string $codUsuario El nuevo código del Usuario.
     */
    public function setCodUsuario($codUsuario): void {
        $this->codUsuario = $codUsuario;
    }

    /**
     * Funcion setPassword
     * 
     * Establece la contraseña de Usuario
     *
     * @param string $password La nueva contrseña del Usuario.
     */
    public function setPassword($password): void {
        $this->password = $password;
    }

    /**
     * Funcion setDescUsuario
     * 
     * Establece la descripcion de Usuario
     *
     * @param string $descUsuario La nueva descripcion del Usuario.
     */
    public function setDescUsuario($descUsuario): void {
        $this->descUsuario = $descUsuario;
    }

    /**
     * Funcion setNumAcceso
     * 
     * Establece el numero de acceso de Usuario
     *
     * @param int $numAcceso El nuevo numero de acceso del Usuario.
     */
    public function setNumAcceso($numAcceso): void {
        $this->numAcceso = $numAcceso;
    }

    /**
     * Funcion setFechaHoraUltimaConexion
     * 
     * Establece la fecha y hora de ultima conexion de Usuario
     *
     * @param DateTime $fechaHoraUltimaConexion La nueva fecha y hora de ultima conexion del Usuario.
     */
    public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion): void {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    /**
     * Funcion setFechaHoraUltimaConexionAnterior
     * 
     * Establece la fecha y hora de ultima conexion anterior de Usuario
     *
     * @param DateTime $fechaHoraUltimaConexionAnterior La nueva fecha y hora de ultima conexion anterior del Usuario.
     */
    public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior): void {
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
    }

    /**
     * Funcion setPerfil
     * 
     * Establece el perfil de Usuario
     *
     * @param string $perfil El nuevo perfil del Usuario.
     */
    public function setPerfil($perfil): void {
        $this->perfil = $perfil;
    }  
}

