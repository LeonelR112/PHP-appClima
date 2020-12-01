<?php
require_once "config.php";

$listCountries = json_decode(file_get_contents('countries.test.json'));
//var_dump($listCountries);


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

echo "<script>console.log('" . $infoUrlClima->weather[0]->icon . "')</script>";
//var_dump($info);


//var_dump($infoUrlClima);
include "./templates/header.php";
?>

    <main class="p-2 mt-4 mb-4">
        <div class="container-md mt-5">
            <h1>Summary</h1>
            <hr style="border: 1px solid grey;">
            <div class="row justify-content-center mainCard">
                <div class="cartaClima col-12 col-lg-8">
                    <h1 class="title border-bottom"><?= $infoUrlClima->name ?> - <?=$infoUrlClima->sys->country?> </h1>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            Current weather
                            <?php
                                include_once "./layouts/iconsWeather.php";
                            ?>
                            <p>
                                <h3 class="text-center"><?=$infoUrlClima->weather[0]->description ?></h3>
                            </p>
                        </div>
                        <div class="infoCiudad col-12 col-md-9">
                            <ul>
                                <li>
                                    <h2><?=$infoUrlClima->main->temp ?> °C</h2>
                                </li>
                                <li>Real feel: <?= $infoUrlClima->main->feels_like ?> °C </li>
                                <li>Humidity: <?= $infoUrlClima->main->humidity ?>% </li>
                                <li>Pressure: <?= $infoUrlClima->main->pressure ?> hPa</li>
                            </ul>
                            <a href="details" class="btn btn-outline-secondary">More details</a>
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