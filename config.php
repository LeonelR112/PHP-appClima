<?php
    session_start();

    ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
    define("APIKEY", "8f4e7ff9ef011166fc00169aa113dd9c");

    $date = new DateTime();
    $format = $date->format("H:i");

?>