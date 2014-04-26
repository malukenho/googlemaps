<?php
require __DIR__.'/vendor/autoload.php';

use GoogleMapsGeocoder;

$address = "Rua panificador Silva, Sergipe, Brasil";

$geocoder = new \GoogleMapsGeocoder();
$geocoder->setAddress($address);
$result = $geocoder->geocode();
print_r($result['results'][0]['geometry']['bounds']['northeast']);
