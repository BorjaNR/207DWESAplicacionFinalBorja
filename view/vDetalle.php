<h1 class="text-secondary">Detalle</h1>
<form class="position-absolute top-0 end-0" style="margin-top: 85px; margin-right: 15px" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input class="btn btn-danger" name="volver" type="submit" value="Volver">
</form>
<div style="margin-bottom: 75px" class="fs-5 text-start">
<?php
//Mostramos la variable $_SESSION
if (isset($_SESSION)) {
    echo '<br><br><h3 class="text-primary">Variable $_SESSION</h3>';
    foreach ($_SESSION as $key => $value) {
        echo '<tr>';
        echo "<td><pre>$key: <span class=\"fw-bolder\">";
        print_r($value);
        echo '</pre></span></td></tr>';
    }
} else {
    echo '<h3 class="text-primary">La variable <b>$_SESSION</b> no está definida</h3>';
}

//Mostramos la variable $_COOKIE
echo '<h3 class="text-primary">Variable $_COOKIE</h3>';
foreach ($_COOKIE as $key => $value) {
    echo "$key: <span class=\"fw-bolder\">$value</span> <br>";
}

//Mostramos la variable $_SERVER
echo '<h3 class="text-primary">Variable $_SERVER</h3>';
foreach ($_SERVER as $key => $value) {
    echo "$key: <span class=\"fw-bolder\">$value</span> <br>";
}

//Mostramos la variable $_GET
echo '<h3 class="text-primary">Variable $_GET</h3>';
foreach ($_GET as $key => $value) {
    echo "$key: <span class=\"fw-bolder\">$value</span><br>";
}

//Mostramos la variable $_POST
echo '<h3 class="text-primary">Variable $_POST</h3>';
foreach ($_POST as $key => $value) {
    echo "$key: <span class=\"fw-bolder\">$value</span><br>";
}

//Mostramos la variable $_REQUEST
echo '<h3 class="text-primary">Variable $_REQUEST</h3>';
foreach ($_REQUEST as $key => $value) {
    echo "$key: <span class=\"fw-bolder\">$value</span><br>";
}

//Mostramos la variable $_FILES
echo '<h3 class="text-primary">Variable $_FILES</h3>';
foreach ($_FILES as $key => $value) {
    echo "$key: <span class=\"fw-bolder\">$value</span><br>";
}

//Mostramos la variable $_ENV
echo '<h3 class="text-primary">Variable $_ENV</h3>';
foreach ($_ENV as $key => $value) {
    echo "$key: <span class=\"fw-bolder\">$value</span><br>";
}

//Mostramos la variable $_GLOBALS
echo '<h3 class="text-primary">Variable $GLOBALS</h3>';
foreach ($GLOBALS as $value) {
    var_dump($value);
    echo ("<br>");
}
phpinfo();
?>
</div>