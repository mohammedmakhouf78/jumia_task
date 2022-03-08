<?php

use App\App;
use Database\Customer;
use Database\DBWrapper;

include __DIR__ . "/../vendor/autoload.php";

include __DIR__ ."/../config.php";

$app = new App();


$app->get("/home",function(){
    $table = new DBWrapper("customer");
    $customer = new Customer();

    $newData = $customer->makeAllData($table->selectAll());
    
    $countries = $customer->getAllCountries($newData);
   
    return [
        'data' => $newData,
        'countries' => $countries
    ];
});

$app->post("/country",function(){
    $country = $_POST['country'];
    $table = new DBWrapper("customer");
    $customer = new Customer();
    $newData = $customer->makeAllData($table->selectAll());
    
    $countries = $customer->getAllCountries($newData);

    if($country != "all")
    {
        $newData = $customer->getDataByCountry($newData,$country);
    }
   
    echo json_encode([
        'data' => $newData,
        'countries' => $countries
    ]);
});

$app->post('/wtf',function(){
    return "wtf";
});


$app->run();