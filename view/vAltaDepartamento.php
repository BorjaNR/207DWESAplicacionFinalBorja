<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 16/05/2024
 */
?>
<h1 class="text-secondary">Añadir Departamento</h1>
<form class="w-45 position-absolute top-50 start-50 translate-middle" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <label class="form-label">Codigo de departamento</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control bg-warning mw-100" placeholder="AAB" style="width: 261.66px; height: 38px;" type="text" name="CodDepartamento" value="<?php echo (isset($_REQUEST['CodDepartamento']) ? $_REQUEST['CodDepartamento'] : ''); ?>">
    </div>
    <div>
        <?php echo (!empty($aErrores['CodDepartamento']) ? '<span style="color: red;">' . $aErrores['CodDepartamento'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <div>
        <label class="form-label">Descripcion de departamento</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input type="text" class="form-control bg-warning mw-100" placeholder="Departamento de Energia" style="width: 261.66px; height: 38px;" name="DescDepartamento" value="<?php echo (isset($_REQUEST['DescDepartamento']) ? $_REQUEST['DescDepartamento'] : ''); ?>">
    </div>
    <div>
        <?php echo (!empty($aErrores['DescDepartamento']) ? '<span style="color: red;">' . $aErrores['DescDepartamento'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <div>
        <label class="form-label">Fecha de creacion</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100" style="width: 261.66px; height: 38px;" type="text" name="fechaCreacionDepartamentoAEditar" value="<?php echo ($fechaYHoraActualCreacionFormateada); ?>" disabled>
    </div>
    <div>
        <label class="form-label">Volumen de negocio</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input type="text" class="form-control bg-warning mw-100" placeholder="5647.21" style="width: 261.66px; height: 38px;" type="text" name="VolumenDeNegocio" value="<?php echo (isset($_REQUEST['VolumenDeNegocio']) ? $_REQUEST['VolumenDeNegocio'] : ''); ?>">
    </div>
    <div>
        <?php echo (!empty($aErrores['VolumenDeNegocio']) ? '<span style="color: red;">' . $aErrores['VolumenDeNegocio'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <input class="btn btn-primary" name="enviar" type="submit" value="Añadir Departamento">
    <input class="btn btn-danger" name="cancelar" type="submit" value="Cancelar">
</form>


