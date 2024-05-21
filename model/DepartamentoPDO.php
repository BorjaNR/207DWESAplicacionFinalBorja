<?php
/**
 * Class DepartamentoPDO
 *
 * Fichero que contiene la clase DepartamentoPDO, que contiene diversas funciones 
 * PHP version 8.1
 * 
 */

/** 
 * Clase de Departamento
 * 
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 06/05/2024
 */
class DepartamentoPDO {

    /**
     * Realiza una consulta filtrando por descripcion de deparamentos y devuleve su resultado
     *
     * @param string $descDepartamento Descripción del Departamento a buscar
     * 
     * @return array[object] $aDepartamentos Con todos los departamentos de la busqueda
     * @return boolean false En caso de que la consulta sea incorrecta
     */
    public static function buscaDepartamentosPorDesc($descDepartamento = '') {
        $aDepartamentos = [];

        // Consulta de busqueda según el valor del parametro introducido
        $consulta = <<<CONSULTA
            SELECT * FROM T02_Departamento
            WHERE T02_DescDepartamento like'%$descDepartamento%';
        CONSULTA;
        // Ejecutamos la consulta llamando al metodo de la clase DBPDO
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta);

        if (!is_null($resultadoConsulta)) {

            // Guardo en la variable el resultado de la consulta en forma de objeto y lo recorro
            while ($oDepartamento = $resultadoConsulta->fetchObject()) {

                //Creamos un nuevo departamento a partir de los datos que nos han pasado por la consulta
                $aDepartamentos[$oDepartamento->T02_CodDepartamento] = new Departamento(
                        $oDepartamento->T02_CodDepartamento,
                        $oDepartamento->T02_DescDepartamento,
                        $oDepartamento->T02_FechaCreacionDepartamento,
                        $oDepartamento->T02_VolumenDeNegocio,
                        $oDepartamento->T02_FechaBajaDepartamento
                );
            }

            //Devolvemos un array que contiene los departamentos extraidos de la consulta
            return $aDepartamentos;

            //En el caso de que la consulta no se realice	
        } else {

            //Devolvemos false
            return false;
        }
    }
    
     /**
     * Metodo que nos permite buscar un departamento por el código 
     * 
     * @param string $codDepartamento El código del Departamento
     * 
     * @return object Departamento 
     */
    public static function buscaDepartamentoPorCod($codDepartamento) {
        //CONSULTA SQL - SELECT
        $consulta = <<<CONSULTA
            SELECT * FROM T02_Departamento 
            WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;

        $resultado = DBPDO::ejecutaConsulta($consulta); // Ejecuto la consulta

        if (!is_null($resultado)) { // Si la consulta es distinta de null
            $oDepartamento = $resultado->fetchObject(); // Guardo en la variable el resultado de la consulta en forma de objeto
            
            if ($oDepartamento) { // Instancio un nuevo objeto Departamento con todos sus datos
                return new Departamento(// Y lo devuelvo
                        $oDepartamento->T02_CodDepartamento,
                        $oDepartamento->T02_DescDepartamento,
                        $oDepartamento->T02_FechaCreacionDepartamento,
                        $oDepartamento->T02_VolumenDeNegocio,
                        $oDepartamento->T02_FechaBajaDepartamento);
            } else {
                return $oDepartamento; // Devuelvo el objeto Departamento
            }
        } else {
            return false; // En caso de fallar devuelvo false
        }
    }
    
    /**
     * Modifica los valores de un departamento
     *
     * @param string $codDepartamento Codigo del Departamento a editar
     * @param string $descDepartamento Descripción del Departamento a editar
     * @param double $volumenDeNegocio Volumen de Negocio del Departamento a editar
     * 
     * @return PDOStatment Devuelve el resultado de la coonsulta
     */
    public static function modificaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio) {
        // Consulta de busqueda según el valor del parametro introducido
        $consulta = <<<CONSULTA
            UPDATE T02_Departamento SET 
            T02_DescDepartamento = '{$descDepartamento}',
            T02_VolumenDeNegocio = {$volumenDeNegocio}
            WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;

        return DBPDO::ejecutaConsulta($consulta); // Ejecutamos y devolvemos la consulta
    }
    
    /**
     * Eliminar un Departamento
     *
     * @param string $codDepartamento Codigo del Departamento a eliminar
     * 
     * @return PDOStatment Devuelve el resultado de la coonsulta
     */
     public static function eliminaDepartamento($codDepartamento) {
        // Consulta de busqueda según el valor del parametro introducido
        $consulta = <<<CONSULTA
            DELETE FROM T02_Departamento WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;

        return DBPDO::ejecutaConsulta($consulta); // Ejecutamos y devolvemos la consulta
    }

    /**
     * Metodo que permite dar de alta un nuevo departamento en la BD
     * 
     * @param string $codDepartamento El codigo de departamento
     * @param string $descDepartamento La descripción de departamento
     * @param float $volumenDeNegocio El volumen de negocio de departamento
     * 
     * @return boolean false | object Departamento Devuelve un objeto Departamento nuevo si se ha podido crear, de lo contrario devuelve un @boolean que sera 'false'
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio) {
        //CONSULTA SQL - INSERT
        $consulta = <<<CONSULTA
            INSERT INTO T02_Departamento VALUES ('{$codDepartamento}','{$descDepartamento}', now(), '{$volumenDeNegocio}', null);
        CONSULTA;

        if (DBPDO::ejecutaConsulta($consulta)) { // Ejecuto la consulta
            return new Departamento($codDepartamento, $descDepartamento, $volumenDeNegocio, date('Y-m-d H:i:s'), null); // Creo el Departamento con los valores recogidos
        } else {
            return false; // Si la consulta falla devuelvo 'false'
        }
    }
    
    /**
     * Modifica el valor de la fecha de baja a un Departamento (Baja Lógica)
     *
     * @param string $codDepartamento Codigo del Departamento a modificar
     * 
     * @return PDOStatment Devuelve el resultado de la coonsulta
     */
    public static function bajaLogicaDepartamento($codDepartamento) {
        // Consulta - UPDATE
        $consulta = <<<CONSULTA
            UPDATE T02_Departamento SET T02_FechaBajaDepartamento = NOW() WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;

        return DBPDO::ejecutaConsulta($consulta); // Ejecutamos y devolvemos la consulta
    }
    
    /**
     * Modifica el valor de la fecha de baja a un Departamento (Alta Lógica)
     *
     * @param string $codDepartamento Codigo del Departamento a modificar
     * 
     * @return PDOStatment Devuelve el resultado de la coonsulta
     */
    public static function rehabilitacionDepartamento($codDepartamento) {
        // Consulta - UPDATE
        $consulta = <<<CONSULTA
            UPDATE T02_Departamento SET T02_FechaBajaDepartamento = NULL WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;

        return DBPDO::ejecutaConsulta($consulta); // Ejecutamos y devolvemos la consulta
    }

}
