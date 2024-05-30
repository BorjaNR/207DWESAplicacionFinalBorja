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
<div class="row mb-5 position-absolute top-75 start-40" style="display: block; width: 50%;margin-left: 500px">
    <div class="col text-center">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <a href="webroot/images/ImagenAplicacionFinal.PNG" target="_blank">
                        <img src="webroot/images/ImagenAplicacionFinal.PNG" class="img-fluid" style="height: 800px;">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <a href="webroot/images/ConstructionImage.jpg" target="_blank">
                        <img src="webroot/images/ConstructionImage.jpg" class="img-fluid" style="height: 800px;">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <a href="webroot/imagenes/sesion.PNG" target="_blank">
                        <img src="webroot/imagenes/sesion.PNG" class="img-fluid" style="height: 800px;">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <a href="webroot/imagenes/archivos.PNG" target="_blank">
                        <img src="webroot/imagenes/archivos.PNG" class="img-fluid" style="height: 800px;">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <a href="webroot/imagenes/ficheros.png" target="_blank">
                        <img src="webroot/imagenes/ficheros.png" class="img-fluid" style="height: 800px;">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <a href="webroot/imagenes/ModeloFisicoDeDatos.png" target="_blank">
                        <img src="webroot/imagenes/ModeloFisicoDeDatos.png" class="img-fluid" style="height: 800px;">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <a href="webroot/documentos/230129CatalogoDeRequisitos.pdf" target="_blank">
                        <img src="webroot/imagenes/requisitos.png" class="img-fluid" style="height: 800px;">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<form class="position-absolute top-0 end-0" style="margin-top: 85px; margin-right: 15px" method="post" action="">
    <input class="btn btn-danger d-block"" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="mi_cuenta" value="Mi Cuenta">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="detalle" value="Detalle">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="mto_departamentos" value="Mto. Departamentos">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="error" value="Error">
    <input class="btn btn-primary d-block" style="margin-top: 10px" type="submit" name="rest" value="Rest">
</form>   