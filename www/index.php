<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>get Location</title>
<?php
error_reporting(-1);
ini_set('display_errors', 1);

require __DIR__.'/App/Request.php';
require __DIR__.'/vendor/jstayton/google-maps-geocoder/src/GoogleMapsGeocoder.php';

$request = new \App\Request();

if ($request->isValidRequest()) {
	$request->validateStreet();
	$location = $request->getGeolocation();
?>
<head>
<style>
    #map {
        width: 100%;
        height: 500px;
    }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">

    var map;
    var position = new google.maps.LatLng(<?= $location['lat']; ?>, <?= $location['lng']; ?>);
    function initialize() {
      var mapOptions = {
        zoom: 8,
        center: position
      };

      map = new google.maps.Map(document.getElementById('map'),
          mapOptions);

      var marker = new google.maps.Marker({
	      position: position,
	      map: map,
	      title: 'Hello World!',
	      draggable: true
	  });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
	<div id="map"></div>
</body>
<?php


} else {
?>
</head>
<body>
		<form action="" method="post">
		<input type="text" name="rua" placeholder="Digite a rua ...">
		<input type="submit" value="Pesquisar">
	</form>
</body>
</html>
<?php } ?>