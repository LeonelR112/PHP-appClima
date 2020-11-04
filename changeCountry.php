<?php
    require "./config.php";

    $_SESSION['country'] = $_GET['countryID'];
    header('location: http://localhost/PHP_Clima/home');

?>