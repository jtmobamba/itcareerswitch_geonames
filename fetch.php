<?php
header("Content-Type: application/json");

$type = $_GET['type'] ?? '';

$urls = [
    'countries' => 'http://api.geonames.org/countryInfoJSON?formatted=true&lang=&username=flightltd&style=full',
    'weather'   => 'http://api.geonames.org/weatherJSON?north=44.1&south=-9.9&east=-22.4&west=55.2&username=flightltd&style=full',
    'earthquakes' => 'http://api.geonames.org/earthquakesJSON?north=44.1&south=-9.9&east=-22.4&west=55.2&username=flightltd&style=full'
];

if (!isset($urls[$type])) {
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$response = file_get_contents($urls[$type]);

if ($response === false) {
    echo json_encode(['error' => 'Failed to fetch data']);
    exit;
}

echo $response;
?>