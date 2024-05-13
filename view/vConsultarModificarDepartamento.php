<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 12/05/2024
 */
?>
<h1 class="text-secondary">Login</h1>
<form class="w-40 position-absolute top-50 start-50 translate-middle" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Codigo de departamento</label>
        <input class="form-control" type="text" name="codDepartamentoAEditar" value="<?php echo ($codDepartamentoAEditar); ?>" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripcion de departamento</label>
        <input class="d-flex justify-content-start obligatorio modDep" type="text" name="T02_DescDepartamento" value="<?php echo (isset($_REQUEST['T02_DescDepartamento']) ? $_REQUEST['T02_DescDepartamento'] : $descripcionDepartamentoAEditar); ?>">
        <?php echo (!empty($aErrores['T02_DescDepartamento']) ? '<span style="color: red;">' . $aErrores['T02_DescDepartamento'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de creacion</label>
        <input class="bloqueado d-flex justify-content-start modDep" type="text" name="fechaCreacionDepartamentoAEditar" value="<?php echo ($fechaCreacionDepartamentoAEditar); ?>" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Volumen de negocio</label>
        <input class="d-flex justify-content-start modDep" type="text" name="T02_VolumenDeNegocio_" value="<?php echo (isset($_REQUEST['T02_VolumenDeNegocio']) ? $_REQUEST['T02_VolumenDeNegocio'] : $volumenNegocioAEditar); ?>">
        <?php echo (!empty($aErrores['T02_VolumenDeNegocio']) ? '<span style="color: red;">' . $aErrores['T02_VolumenDeNegocio'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <input class="btn btn-primary" name="enviar" type="submit" value="Confirmar">
    <input class="btn btn-danger" name="cancelar" type="submit" value="Cancelar">
</form>
