<?php
    session_start();
    require "./vendor/autoload.php";

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    //ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
    //date_default_timezone_set('America/New_York')
    

?>