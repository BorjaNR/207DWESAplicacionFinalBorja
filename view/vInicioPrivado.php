<h1 class="text-secondary">Inicio Privado</h1>
<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0 
 * @since 03/05/2024
 */

//Muestro los mensajes
echo '<p>Bienvenido, '.$avInicioPrivado['descUsuario'] . '<br>';
if (is_null($avInicioPrivado['ultimaConexionAnterior'])) {
    echo 'Esta es la primera vez que te conectas </p>';
} else {
    echo 'Esta es tu ' . $avInicioPrivado['numConexiones'] . ' vez conectandote<br>';
    echo 'Te conectaste por última vez ' . $avInicioPrivado['ultimaConexionAnterior'] . '</p>';
}
?>
<img src="webroot/images/ImagenAplicacionFinal.PNG" alt="Mapeo de la Aplicación">
<form class="position-absolute top-0 end-0" style="margin-top: 85px; margin-right: 15px" method="post" action="">
    <input class="btn btn-danger d-block"" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="mi_cuenta" value="Mi Cuenta">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="detalle" value="Detalle">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="mto_departamentos" value="Mto. Departamentos">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="error" value="Error">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="rest" value="Rest">
</form>   