<?php

/**
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
     * Modifica los valores de un departamento
     *
     * @param string $codDepartamento Codigo del Departamento a editar
     * @param string $descDepartamento Descripción del Departamento a editar
     * @param float $volumenDeNegocio Volumen de Negocio del Departamento a editar
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
}
