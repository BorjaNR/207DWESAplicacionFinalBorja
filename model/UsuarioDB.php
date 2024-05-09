<?php

/**
 * @author Borja Nueñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */
interface UsuarioDB {

    // Validar las credenciales del usuario
    public static function validarUsuario($codUsuario, $password);
}

