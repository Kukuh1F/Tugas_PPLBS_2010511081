<?php
require 'vendor/autoload.php';
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('HospitalApp');
$server->wsdl->schemaTargetNamespace = $namespace;


function get_namaUser($name) {
    return "Selamat Datang $name";
}

$server->register('get_namaUser',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Hello World Sederhana'
);

function get_JumlahKurang($nil1, $nil2, $category) {
    if($category == 'tambah') {
        $hasil = $nil1 + $nil2;
        return "Hasil penjumlahan $nil1 dengan $nil2 adalah $hasil";
    }
    elseif($category == 'kurang') {
        $hasil = $nil1 - $nil2;
        return "Hasil pengurangan $nil1 dengan $nil2 adalah $hasil";
        
    }
    else {
        return "Tidak ada nilai yang dimasukkan";
    }
}

$server->register('get_JumlahKurang',
    array(
        'nil1' => 'xsd:int',
        'nil2' => 'xsd:int',
        'category' => 'xsd:string'
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Get Jumlah dan Kurang sederhana'
);

function get_BMI($tinggi,$berat) {
    $bmi = $berat/($tinggi*$tinggi);
    $bmi2 = round($bmi);
    return "Hasil BMI yang kamu dapatkan $bmi2";
}

$server->register('get_BMI',
    array('tinggi' => 'xsd:float',
        'berat' => 'xsd:float'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode mencari BMI'
);

$server->service(file_get_contents("php://input"));
exit();