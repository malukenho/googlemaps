<?php
require __DIR__.'/vendor/autoload.php';

use GoogleMapsGeocoder;

$address = "Avenida Desembargador Maynard, Sergipe, Brasil";

$Geocoder = new \GoogleMapsGeocoder();
$Geocoder->setAddress($address);

print_r($Geocoder->geocode());