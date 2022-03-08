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

    $pageCount = ceil(count($newData) / NUMBER_PER_PAGE);
   
    return [
        'data' => $newData,
        'countries' => $countries,
        'pageCount' => $pageCount
    ];
});

$app->post("/country",function(){
    $country = $_POST['country'];
    $table = new DBWrapper("customer");
    $customer = new Customer();
    $newData = $customer->makeAllData($table->selectAll());
    

    if($country != "all")
    {
        $newData = $customer->getDataByCountry($newData,$country);
    }
   
    echo json_encode([
        'data' => $newData,
    ]);
});

$app->post('/state',function(){
    $state = $_POST['state'];
    $table = new DBWrapper("customer");
    $customer = new Customer();
    $newData = $customer->makeAllData($table->selectAll());
    

    if($state != "all")
    {
        $newData = $customer->getDataByState($newData,$state);
    }
   
    echo json_encode([
        'data' => $newData,
    ]);
});


$app->post('/page',function(){
    $pageNumber = $_POST['pageNumber'];

    $table = new DBWrapper("customer");
    $customer = new Customer();
    $offset = NUMBER_PER_PAGE * ($pageNumber - 1);
    $data = $table->selectForPagination(NUMBER_PER_PAGE,$offset);
    $newData = $customer->makeAllData($data);
   
    echo json_encode([
        'data' => $newData,
    ]);
});

$app->run();