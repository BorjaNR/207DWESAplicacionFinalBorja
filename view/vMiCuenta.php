<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 30/05/2024
 */
?>
<h1 class="text-secondary">Mi Cuenta</h1>
<form class="w-45 position-absolute top-50 start-50 translate-middle" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <label class="form-label">Código Usuario</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100" style="width: 261.66px; height: 38px;" type="text" name="codUsuario" value="<?php echo $avMiCuenta['codUsuario']; ?>" disabled>
    </div>
    <div>
        <label class="form-label">Contraseña</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input type="password" class="form-control mw-100" style="width: 261.66px; height: 38px;" name="contraseña" value="<?php echo $avMiCuenta['contraseña']?>" disabled>
    </div>
    <div>
        <label class="form-label">Descripcion Usuario</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100 bg-warning " style="width: 261.66px; height: 38px;" type="text" name="descUsuario" value="<?php echo (isset($_REQUEST['descUsuario']) ? $_REQUEST['descUsuario'] : $avMiCuenta['descUsuario']); ?>">
    </div>
    <div>
        <?php echo (!empty($aErrores['descUsuario']) ? '<span style="color: red;">' . $aErrores['descUsuario'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <div>
        <label class="form-label">Numero de conexiones</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input type="text" class="form-control mw-100"  style="width: 261.66px; height: 38px;" type="text" name="nConexiones" value="<?php echo $avMiCuenta['nConexiones'] ?>" disabled>
    </div>
    <div>
        <label class="form-label">Fecha y hora de la ultima conexión</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input type="text" class="form-control mw-100"  style="width: 261.66px; height: 38px;" type="text" name="fechaHoraUltimaConexionAnterior" value="<?php echo $avMiCuenta['fechaHoraUltimaConexionAnterior'] ?>" disabled>
    </div>
    <input class="btn btn-primary" name="enviar" type="submit" value="Confirmar">
    <input class="btn btn-danger" name="cancelar" type="submit" value="Cancelar">
    <input class="btn btn-danger" name="eliminar" type="submit" value="Eliminar">
    <input class="btn btn-primary" name="cambiarPassword" type="submit" value="Cambiar Contraseña">
</form>

