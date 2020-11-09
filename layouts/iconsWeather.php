<?php
    if(date("H:i",$infoUrlClima->dt) > strtotime("06:00") && date("H:i",$infoUrlClima->dt) < strtotime("19:00")  ){
        switch ($infoUrlClima->weather[0]->description) {
            case 'nubes dispersas':
                echo "<img src='./img/icons/cloudy.png' width='150px' alt='nubes'>";
                break;

            case 'nubes':
                echo "<img src='./img/icons/cloud.png' width='150px' alt='nubes'>";
            break;

            case 'muy nuboso':
                echo "<img src='./img/icons/cloud.png' width='150px' alt=''>";
            break;

            case 'algo de nubes':
                echo "<img src='./img/icons/cloudy.png' width='150px' alt=''>";
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

            case 'niebla':
                echo "<img src='./img/icons/niebla.png' width='150px' alt=''>";
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

            case 'muy nuboso':
                echo "<img src='./img/icons/cloud.png' width='150px' alt=''>";
            break;

            case 'algo de nubes':
                echo "<img src='./img/icons/cloudy.png' width='150px' alt=''>";
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

            case 'niebla':
                echo "<img src='./img/icons/niebla.png' width='150px' alt=''>";
                break;

            default:
                echo "<img src='./img/icons/sunny.png' width='150px' alt='imagen'>";
            break;
        }
    }
?>