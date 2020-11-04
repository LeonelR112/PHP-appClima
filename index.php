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
}


//var_dump($info);

$infoUrlClima = json_decode($json);

//ar_dump($infoUrlClima);
include "./templates/header.php";
?>



    <main class="p-2">
        <div class="container-md mt-5">
            <h1>Resumen</h1>
            <div class="row justify-content-center">
                <div class="cartaClima col-12 col-lg-8">
                    <h1 class="title border-bottom"><?= $infoUrlClima->name ?></h1>
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

    <!-- Modal -->
    <div class="modal fade" id="countryChange" tabindex="-1" aria-labelledby="countryChange" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="changeCountry.php" method="get">
                    <select class="custom-select" size="5" name="countryID">
                        <?php
                            foreach($listCountries as $country){
                        ?>
                            <option value="<?=$country->id ?>"><?=$country->name ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Seleccionar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

<?php
include "./templates/footer.php";
?>