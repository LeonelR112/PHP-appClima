<?php
    switch ($infoUrlClima->weather[0]->icon) {

        case '01d':
            $icon = "01n";
            echo "<img src='http://openweathermap.org/img/wn/01d@2x.png' width='170px'>";
        break;

        case '02d':
            $icon = "01n";
            echo "<img src='http://openweathermap.org/img/wn/02d@2x.png' width='170px'>";
        break;

        case '03d':
            $icon = "01n";
            echo "<img src='http://openweathermap.org/img/wn/03d@2x.png' width='170px'>";
        break;

        case '01n':
            $icon = "01n";
            echo "<img src='http://openweathermap.org/img/wn/01n@2x.png' width='170px'>";
        break;

        case '02n':
            $icon = "01n";
            echo "<img src='http://openweathermap.org/img/wn/02n@2x.png' width='170px'>";
        break;

        case '03n':
            $icon = "01n";
            echo "<img src='http://openweathermap.org/img/wn/03n@2x.png' width='170px'>";
        break;

        case '04n':
            $icon = "01n";
            echo "<img src='http://openweathermap.org/img/wn/04n@2x.png' width='170px'>";
        break;

        default:
            echo "icon not found";
            break;
    }
?>