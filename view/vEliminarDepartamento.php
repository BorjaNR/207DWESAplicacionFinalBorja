<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 16/05/2024
 */
?>
<h1 class="text-secondary">Eliminar Departamento</h1>
<form class="w-45 position-absolute top-50 start-50 translate-middle" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <label class="form-label">Codigo de departamento</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100" style="width: 261.66px; height: 38px;" type="text" name="codDepartamentoAEditar" value="<?php echo $avConsultarModificarDepartamento['codDepartamento']; ?>" disabled>
    </div>
    <div>
        <label class="form-label">Descripcion de departamento</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input type="text" class="form-control mw-100" style="width: 261.66px; height: 38px;" name="T02_DescDepartamento" value="<?php echo $avConsultarModificarDepartamento['descDepartamento']?>" disabled>
    </div>
    <div>
        <label class="form-label">Fecha de creacion</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100" style="width: 261.66px; height: 38px;" type="text" name="fechaCreacionDepartamentoAEditar" value="<?php echo $avConsultarModificarDepartamento['fechaCreacion']; ?>" disabled>
    </div>
    <div>
        <label class="form-label">Volumen de negocio</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input type="text" class="form-control mw-100"  style="width: 261.66px; height: 38px;" type="text" name="T02_VolumenDeNegocio" value="<?php echo $avConsultarModificarDepartamento['volumen'] ?>" disabled>
    </div>
    <input class="btn btn-primary" name="enviar" type="submit" value="Eliminar Departamento">
    <input class="btn btn-danger" name="cancelar" type="submit" value="Cancelar">
</form>
