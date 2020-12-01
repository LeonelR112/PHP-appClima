<?php
    switch ($infoUrlClima->weather[0]->icon) {

        case '01d':
            echo "<img src='http://openweathermap.org/img/wn/01d@2x.png' width='170px'>";
        break;

        case '02d':
            echo "<img src='http://openweathermap.org/img/wn/02d@2x.png' width='170px'>";
        break;

        case '03d':
            echo "<img src='http://openweathermap.org/img/wn/03d@2x.png' width='170px'>";
        break;

        case '04d':
            echo "<img src='http://openweathermap.org/img/wn/03d@2x.png' width='170px'>";
        break;

        case '01n':
            echo "<img src='http://openweathermap.org/img/wn/04n@2x.png' width='170px'>";
        break;

        case '02n':
            echo "<img src='http://openweathermap.org/img/wn/02n@2x.png' width='170px'>";
        break;

        case '03n':
            echo "<img src='http://openweathermap.org/img/wn/03n@2x.png' width='170px'>";
        break;

        case '04n':
            echo "<img src='http://openweathermap.org/img/wn/04n@2x.png' width='170px'>";
        break;

        //precipitaciones

        case '09d':
            echo "<img src='http://openweathermap.org/img/wn/09d@2x.png' width='170px'>";
        break;

        case '10d':
            echo "<img src='http://openweathermap.org/img/wn/10d@2x.png' width='170px'>";
        break;

        case '11d':
            echo "<img src='http://openweathermap.org/img/wn/11d@2x.png' width='170px'>";
        break;

        case '13d':
            echo "<img src='http://openweathermap.org/img/wn/13d@2x.png' width='170px'>";
        break;

        case '50d':
            echo "<img src='http://openweathermap.org/img/wn/50d@2x.png' width='170px'>";
        break;

        case '09n':
            echo "<img src='http://openweathermap.org/img/wn/09n@2x.png' width='170px'>";
        break;

        case '10n':
            echo "<img src='http://openweathermap.org/img/wn/10n@2x.png' width='170px'>";
        break;

        case '11n':
            echo "<img src='http://openweathermap.org/img/wn/11n@2x.png' width='170px'>";
        break;

        case '13n':
            echo "<img src='http://openweathermap.org/img/wn/13n@2x.png' width='170px'>";
        break;

        case '50n':
            echo "<img src='http://openweathermap.org/img/wn/50n@2x.png' width='170px'>";
        break;
        

        default:
            echo "icon not found";
            break;
    }
?>