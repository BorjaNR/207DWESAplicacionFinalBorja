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
                <td colspan="3"><textarea class="form-control" rows="1" name="DescDepartamento"><?php echo isset($_SESSION['criterioBusquedaDepartamentos']['descDepartamento']) ? $_SESSION['criterioBusquedaDepartamentos']['descDepartamento'] : "" ?></textarea></td>
                <td colspan="3"><?php echo (!empty($aErrores["DescDepartamento"]) ? '<span style="color: red;">' . $aErrores["DescDepartamento"] . '</span>' : ''); //Esto es para mostrar el mensaje de error en color rojo      ?></td>
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
            echo("</td>");
            echo "</tr>";
        }
        ?>
    </table>
</div>

