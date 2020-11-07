<?php
require_once "config.php";

$listCountries = json_decode(file_get_contents('countries.test.json'));


$urlBase1 = "http://api.openweathermap.org/data/2.5/weather?id=3433955&appid=" . APIKEY . "&units=metric&lang=sp";

if(!isset($_SESSION['country'])){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlBase1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);
    $info = curl_getinfo($ch);
    $infoUrlClima = json_decode($json);

    ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
    $format = $date->format("H:i");

}
else{
    $ciudadId = $_SESSION['country'];
    $setURL = "http://api.openweathermap.org/data/2.5/weather?id=" . $ciudadId ."&appid=" . APIKEY . "&units=metric&lang=sp";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $setURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);
    $info = curl_getinfo($ch);
    $infoUrlClima = json_decode($json);

    $Time = new DateTime();
    $Time->format('H:i');
    $Time->setTimestamp($infoUrlClima->dt);

}

//var_dump($info);

//var_dump($infoUrlClima);
include "./templates/header.php"
?>
    
    <main class="p-2">
        <h1>Detalles</h1>
        <hr style="border:1px solid grey"> 
    <div class="container-md mt-5">
        <div class="row">
            <div class="col-12">
                <h2><?=$infoUrlClima->name ?></h2>
                <div class="row">
                <div class="col-12 align-items-center">
                    <?php
                           if(date("H:i",$infoUrlClima->dt) > strtotime("06:00") && date("H:i",$infoUrlClima->dt) < strtotime("19:00")  ){
                            switch ($infoUrlClima->weather[0]->description) {
                                case 'nubes dispersas':
                                    echo "<img src='./img/icons/cloudy.png' width='150px' alt='nubes'>";
                                    break;

                                case 'nubes':
                                    echo "<img src='./img/icons/cloud.png' width='150px' alt='nubes'>";
                                break;

                                case "lluvia moderada":
                                    echo "<img src='./img/icons/some_rain.png' width='150px' alt='nubes'>";
                                break;

                                case 'chubasco de ligera intensidad':
                                    echo "<img src='./img/icons/some_rain.png' width='150px' alt='nubes'>";
                                break;
                                
                                case 'cielo claro':
                                    echo "<img src='./img/icons/sunny.png' width='150px' alt=''>";
                                    break;
                                
                                case 'lluvia ligera':
                                    echo "<img src='./img/icons/some_rain.png' width='150px' alt=''>";
                                    break;

                                default:
                                    echo "<img src='./img/icons/sunny.png' width='150px' alt='imagen'>";
                                    break;
                            }
                        }
                        else{
                            switch ($infoUrlClima->weather[0]->description) {
                                case 'nubes dispersas':
                                    echo "<img src='./img/icons/semiClear_night.png' width='150px' alt='nubes'>";
                                break;
                                
                                case 'nubes':
                                    echo "<img src='./img/icons/cloud.png' width='150px' alt='nubes'>";
                                break;

                                case "lluvia moderada":
                                    echo "<img src='./img/icons/some_rain.png' width='150px' alt='nubes'>";
                                break;
                                
                                case 'chubasco de ligera intensidad':
                                    echo "<img src='./img/icons/some-rain-night.png' width='150px' alt='nubes'>";
                                break;
                                
                                case 'cielo claro':
                                    echo "<img src='./img/icons/clear_night.png' width='150px' alt=''>";
                                break;
                                
                                case 'lluvia ligera':
                                    echo "<img src='./img/icons/some-rain-night.png' width='150px' alt=''>";
                                break;

                                default:
                                    echo "<img src='./img/icons/sunny.png' width='150px' alt='imagen'>";
                                break;
                            }
                        }
                    ?>
                    <span class="h2"> <?=$infoUrlClima->main->temp ?> °C</span>
                </div>
                <div class="col-12 align-items-center"> 
                    <small class="h5"> Sensación térmica: <?=$infoUrlClima->main->feels_like ?> °C</small>
                </div>
                    <div class="col-4 infoCiudad">
                        <ul>
                            <li>hora actual:<?=$Time->format("H:s") ?>  hs</li>
                            <li>min: <?=$infoUrlClima->main->temp_min ?> °C</li>
                            <li>max: <?=$infoUrlClima->main->temp_max ?> °C</li>
                            <li>hora del amanecer:  </li>
                            <li>hora del atardecer:</li>
                            <li>presión: <?=$infoUrlClima->main->pressure ?> hPa</li>
                        </ul>
                    </div>
                    <div class="col-4 infoCiudad">
                        <ul>
                            <li>detalles: <?=$infoUrlClima->weather[0]->description?></li>
                            <li>humedad: <?=$infoUrlClima->main->humidity ?>%</li>
                            <li>nubosidad: <?=$infoUrlClima->clouds->all ?> %</li>
                            <li>Viento: <img src="./img/wind.png" style="transform: rotate(<?=$infoUrlClima->wind->deg ?>deg);" width="40px" alt=""> <?=$infoUrlClima->wind->speed ?> km/h</li>
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