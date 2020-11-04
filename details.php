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
}


//var_dump($info);

$infoUrlClima = json_decode($json);

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
                    <img src="./img/icons/sunny.png" width="70px" alt="img">  
                    <span class="h2"> <?=$infoUrlClima->main->temp ?> °C</span>
                </div>
                <div class="col-12 align-items-center"> 
                    <small class="h5"> Sensación térmica: <?=$infoUrlClima->main->feels_like ?> °C</small>
                </div>
                    <div class="col-4 infoCiudad">
                        <ul>
                            <li>min: <?=$infoUrlClima->main->temp_min ?> °C</li>
                            <li>max: <?=$infoUrlClima->main->temp_max ?> °C</li>
                            <li>presión: <?=$infoUrlClima->main->pressure ?> hPa</li>
                        </ul>
                    </div>
                    <div class="col-4 infoCiudad">
                        <ul>
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

    <!-- Modal -->
    <div class="modal fade" id="countryChange" tabindex="-1" aria-labelledby="countryChange" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="changeCountry.php" method="get">
                    <select class="custom-select" size="5">
                        <option selected>Seleccionar un país</option>
                        <?php
                            foreach($listCountries as $country){
                        ?>
                            <option value="<?=$country->id ?>"><?=$country->name ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Seleccionar</button>
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