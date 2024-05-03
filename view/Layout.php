<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Aplicacion Final</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="webroot/css/main.css"/>
    </head>
    <body>
        <header class="text-center bg-secondary text-white">
            <h1>Aplicacion Final</h1>
        </header>
        <main style="margin-bottom: 75px" class="fs-5 text-center">
            <?php require_once $view[$_SESSION['paginaEnCurso']]; ?>
        </main>
        <footer class="text-center bg-secondary fixed-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col text-center text-white">
                        <p>&copy;2023-24 IES los Sauces. Todos los derechos reservados. <a href="../index.html" style="text-decoration: none; background-color: transparent; color: white">Borja Nuñez Refoyo</a></p>
                    </div>
                    <div class="col text-end">
                        <a title="GitHub" href="https://github.com/BorjaNR/207DWESAplicacionFinalBorja" target="blank"><img src="./webroot/images/git.png" width="40" height="40" alt="GitHub"/></a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="./webroot/js/mainjs.js" ></script>
    </body>
</html>
