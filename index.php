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

    ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
    $format = $date->format("H:i");
}
else{
    $ciudadId = $_SESSION['country'];
    $setURL = "http://api.openweathermap.org/data/2.5/weather?id=" . $ciudadId ."&appid=" . APIKEY . "&units=metric&lang=es";

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
    //var_dump($info);
}


//var_dump($info);


//ar_dump($infoUrlClima);
include "./templates/header.php";
?>



    <main class="p-2">
        <div class="container-md mt-5">
            <h1>Resumen</h1>
            <hr style="border: 1px solid grey;">
            <div class="row justify-content-center">
                <div class="cartaClima col-12 col-lg-8">
                    <h1 class="title border-bottom"><?= $infoUrlClima->name ?> - <?=$infoUrlClima->sys->country?> </h1>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            Tiempo actual
                            
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
                            <p>
                                <h3 class="text-center"><?=$infoUrlClima->weather[0]->description ?></h3>
                            </p>
                        </div>
                        <div class="infoCiudad col-12 col-md-9">
                            <ul>
                                <li>
                                    <h2><?=$infoUrlClima->main->temp ?> °C</h2>
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