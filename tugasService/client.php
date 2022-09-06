<?php
require 'vendor/autoload.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('get_namaUser', array(
    'name' => 'Kukuh'
));
echo $response;

echo '<br>';
$response = $client->call('get_JumlahKurang', array(
    'nil1' => 5,
    'nil2' => 1,
    'category' => 'tambah'
));
echo $response;

echo '<br>';
$response = $client->call('get_JumlahKurang', array(
    'nil1' => 5,
    'nil2' => 10,
    'category' => 'kurang'
));
echo $response;

echo '<br>';
$response = $client->call('get_BMI', array(
    'tinggi' => 1.7,
    'berat' => 60
));
echo $response;