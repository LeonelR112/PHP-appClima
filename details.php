<?php
require_once "config.php";

$listCountries = json_decode(file_get_contents('countries.test.json'));


$urlBase1 = "http://api.openweathermap.org/data/2.5/weather?id=3433955&appid=" . APIKEY . "&units=metric";

if(!isset($_SESSION['country'])){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlBase1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);
    $info = curl_getinfo($ch);
    $infoUrlClima = json_decode($json);


}
else{
    $ciudadId = $_SESSION['country'];
    $setURL = "http://api.openweathermap.org/data/2.5/weather?id=" . $ciudadId ."&appid=" . APIKEY . "&units=metric";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $setURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);
    $info = curl_getinfo($ch);
    $infoUrlClima = json_decode($json);

}

//var_dump($info);

//var_dump($infoUrlClima);
include "./templates/header.php";

?>
    
    <main class="p-2 mt-4 mb-4">
        <h1>Details</h1>
        <hr style="border:1px solid grey"> 
    <div class="container-md mt-5">
        <div class="row">
            <div class="col-12">
                <h2><?=$infoUrlClima->name ?></h2>
                <div class="row">
                <div class="col-12 align-items-center">
                    <?php
                        include_once "./layouts/iconsWeather.php";
                    ?>
                    <span class="h2"> <?=$infoUrlClima->main->temp ?> °C</span>
                </div>
                <div class="col-12 align-items-center"> 
                    <small class="h5"> Real feel: <?=$infoUrlClima->main->feels_like ?> °C</small>
                </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 infoCiudad">
                        <ul>
                            <li>details: <?=$infoUrlClima->weather[0]->description?></li>
                            <li>Min: <?=$infoUrlClima->main->temp_min ?> °C</li>
                            <li>Max: <?=$infoUrlClima->main->temp_max ?> °C</li>
                            <li>Pressure: <?=$infoUrlClima->main->pressure ?> hPa</li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 infoCiudad">
                        <ul>
                            <li>Humidity: <?=$infoUrlClima->main->humidity ?>%</li>
                            <li>Cloudiness: <?=$infoUrlClima->clouds->all ?> %</li>
                            <li>Wind: <img src="./img/wind.png" style="transform: rotate(<?=$infoUrlClima->wind->deg ?>deg);" width="40px" alt=""> <?=$infoUrlClima->wind->speed ?> km/h</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>

<?php
    require_once "./layouts/modalCountryChange.php";
    include "./templates/footer.php";
?>