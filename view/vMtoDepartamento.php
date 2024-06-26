<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 06/05/2024
 */
?>
<h1 class="text-secondary">Mto Departamentos</h1>
<form class="position-absolute top-0 end-0" style="margin-top: 85px; margin-right: 15px" method="post" action="">
    <input class="btn btn-danger d-block"" type="submit" name="volver" value="Volver">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="añadir" value="Añadir Departamento">
</form>
<form class="w-10" style="margin:50px" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container t-container">
        <table class="table table-striped"> 
            <tr>
                <td colspan="3"><label class="form-label">Descripcion de Departamento</label></td>
                <td colspan="3">
                    <textarea class="form-control" rows="1" name="DescDepartamento"><?php echo isset($_SESSION['criterioBusquedaDepartamentos']['descDepartamento']) ? $_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] : "" ?></textarea>
                    <div>
                        <label style="margin-right: 5px" class="form-label">Estado: </label>
                        <label class="form-label">Todos</label>
                        <input style="margin-right: 5px" name="estado" id="tipoDepartamentoTodos" type="radio" value="todos" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_TODOS ? 'checked' : '') : ''; ?>>
                        <label class="form-label">Altas</label>
                        <input style="margin-right: 5px" name="estado" id="tipoDepartamentoAltas" type="radio" value="altas" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_ALTAS ? 'checked' : '') : 'checked'; ?>>
                        <label class="form-label">Bajas</label>
                        <input style="margin-right: 5px" name="estado" id="tipoDepartamentoBajas" type="radio" value="bajas" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_BAJAS ? 'checked' : '') : ''; ?>>
                    </div> 
                </td>    
                <td colspan="3"><?php echo (!empty($aErrores["DescDepartamento"]) ? '<span style="color: red;">' . $aErrores["DescDepartamento"] . '</span>' : ''); //Esto es para mostrar el mensaje de error en color rojo            ?></td>
                <td colspan="3"><input class="btn btn-primary" rows="1" name="enviar" type="submit" value=Buscar></td>
            </tr>
        </table>
    </div>
</form>
<div class="container t-container" style="margin-top: 100px;margin-bottom: 100px">
    <table class="table table-striped table-bordered" style="margin-bottom: 75px; margin-top: 75px"> 
        <tr class="table-secondary">
            <th>Codigo de Departamento</th>
            <th>Descripcion de Departamento</th>
            <th>Fecha de Creacion</th>
            <th>Volumen de Negocio</th>
            <th>Fecha de Baja</th>
            <th>Acciones</th>
        </tr>
        <?php
        //Mostramos los departamentos en una tabla
        foreach ($aDepartamentoVista as $aDepartamento) {
            echo "<tr>";
            echo ("<td>" . $aDepartamento['codDepartamento'] . "</td>");
            echo ("<td>" . $aDepartamento['descDepartamento'] . "</td>");
            echo ("<td>" . $aDepartamento['fechaCreacionDep'] . "</td>");
            echo ("<td>" . $aDepartamento['volumenDeNegocio'] . "</td>");
            echo ("<td>" . $aDepartamento['fechaBajaDep'] . "</td>");
            // Formulario para editar
            echo("<td class='d-flex'>");
            echo ("<form method='post'>");
            echo ("<input type='hidden' name='ConsultarModificarDepartamento' value='" . $aDepartamento['codDepartamento'] . "'>");
            echo ("<button type='submit' style='margin-right: 5px;'><img src='webroot/images/editar.png' alt='EDIT' width='15' height='10'></button>");
            echo ("</form>");
            // Formulario para eliminar
            echo ("<form method='post'>");
            echo ("<input type='hidden' name='borrar' value='" . $aDepartamento['codDepartamento'] . "'>");
            echo ("<button type='submit' style='margin-right: 5px;'><img src='webroot/images/borrar.png' alt='DELETE' width='15' height='10'></button>");
            echo ("</form>");
            // Formulario para baja lógica
            // Compruebo la variable que almacena la fecha de baja para mostrar/ocultar el elemento
            if (empty($aDepartamento['fechaBajaDep'])) {
                echo ("<form method='post'>");
                echo ("<input type='hidden' name='bajaLogica' value='" . $aDepartamento['codDepartamento'] . "'>");
                echo ("<button type='submit' style='margin-right: 5px;'><img src='webroot/images/bajaLogica.png' alt='ALTA' width='15' height='10'></button>");
                echo ("</form>");
            }
            // Formulario para rehabilitacion
            // Compruebo la variable que almacena la fecha de baja para mostrar/ocultar el elemento
            if (!empty($aDepartamento['fechaBajaDep'])) {
                echo ("<form method='post'>");
                echo ("<input type='hidden' name='rehabilitar' value='" . $aDepartamento['codDepartamento'] . "'>");
                echo ("<button type='submit' style='margin-right: 5px;'><img src='webroot/images/rehabilitar.png' alt='REHABILITACION' width='15' height='10'></button>");
                echo ("</form>");
            }
            echo "</tr>";
        }
        ?>
    </table>
    <div class="col">
        <form name="indexMtoDepartamentos" method="post">
            <div class="row">
                <div class="col">
                    <button class="botones" type="submit" name="paginaPrimera">PRIMERA PAGINA</button>
                </div>
                <div class="col">
                    <button class="botones" type="submit" name="paginaAnterior">PAGINA ANTERIOR</button>
                </div>
                <div class="col">
                    <?php echo $_SESSION['numPaginacionDepartamentos'] ?> / <?php echo ceil($iDepartamentosTotales) ?>
                </div>
                <div class="col">
                    <button class="botones" type="submit" name="paginaSiguiente">PAGINA SIGUIENTE</button>
                </div>
                <div class="col">
                    <button class="botones" type="submit" name="paginaUltima">ULTIMA PAGINA</button>
                </div>
            </div>
        </form>
    </div>

