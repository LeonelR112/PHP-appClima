<?php
    switch ($infoUrlClima->weather[0]->description) {
        case 'cielo claro': //despejado
            echo "<img src='./img/icons/sunny.png' width='150px' alt='nubes'>";
        break;

        case 'muy nuboso' || 'nubes dispersas': //algunas nubes
            echo "<img src='./img/icons/cloudy.png' width='150px' alt='nubes'>";
        break;
        
        case 'algo de nubes': //nubes
            echo "<img src='./img/icons/clouds.png' width='150px' alt='nubes'>";
        break;

        case 'nubes': //muy Nublado
            echo "<img src='./img/icons/cloud.png' width='150px' alt='nubes'>";
        break;

        case 'lluvia moderada': //muy Nublado
            echo "<img src='./img/icons/rain.png' width='150px' alt='nubes'>";
        break;

        case 'lluvia ligera': //muy Nublado
            echo "<img src='./img/icons/some_rain.png' width='150px' alt='nubes'>";
        break;

        case '11d': //muy Nublado
            echo "<img src='./img/icons/storm.png' width='150px' alt='nubes'>";
        break;

        case '13d': //muy Nublado
            echo "<img src='./img/icons/snow.png' width='150px' alt='nubes'>";
        break;

        case 'niebla': //muy Nublado
            echo "<img src='./img/icons/niebla.png' width='150px' alt='nubes'>";
        break;

        default:
            echo "icon not found!";
            break;
    }
?>