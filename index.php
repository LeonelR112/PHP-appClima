<?php
require_once "config.php";

$listCountries = json_decode(file_get_contents('countries.test.json'));
//var_dump($listCountries);


$urlBase1 = "http://api.openweathermap.org/data/2.5/weather?id=3433955&appid=" . APIKEY . "&units=metric&lang=es";

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
    //var_dump($info);
}


//var_dump($info);


//ar_dump($infoUrlClima);
include "./templates/header.php";
?>



    <main class="p-2">
        <div class="container-md mt-5">
            <h1>Resumen</h1>
            <div class="row justify-content-center">
                <div class="cartaClima col-12 col-lg-8">
                    <h1 class="title border-bottom"><?= $infoUrlClima->name ?> | <?=$format ?>hs</h1>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            Tiempo actual
                            <?php
                            switch ($infoUrlClima->weather[0]->main) {
                                case 'Clouds':
                                    echo "<img src='./img/icons/cloudy.png' width='150px' alt=''>";
                                    break;

                                case 'Clear':
                                    echo "<img src='./img/icons/sunny.png' width='150px' alt=''>";
                                    break;
                                
                                case 'Rain':
                                    echo "<img src='./img/icons/rain.png' width='150px' alt=''>";
                                    break;

                                default:
                                    echo "<img src='./img/icons/sunny.png' width='150px' alt='imagen'>";
                                    break;
                            }
                            ?>

                        </div>
                        <div class="infoCiudad col-12 col-md-9">
                            <ul>
                                <li>
                                    <h3><?=$infoUrlClima->main->temp ?> °C</h3>
                                </li>
                                <li>Sensación térmica: <?= $infoUrlClima->main->feels_like ?> °C </li>
                                <li>Humedad: <?= $infoUrlClima->main->humidity ?>% </li>
                                <li>Presion: <?= $infoUrlClima->main->pressure ?> hPa</li>
                            </ul>
                            <a href="details" class="btn btn-outline-secondary">Más detalles</a>
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