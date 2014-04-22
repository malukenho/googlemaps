<?php
require __DIR__.'/vendor/autoload.php';

use GoogleMapsGeocoder;

$address = "Avenida Desembargador Maynard, Sergipe, Brasil";
$address = "Rua panificador Silva, Sergipe, Brasil";

$geocoder = new \GoogleMapsGeocoder();
$geocoder->setAddress($address);

print_r($geocoder->geocode());
