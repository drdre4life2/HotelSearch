<?php

namespace src\Search;

include_once 'vendor/autoload.php';

use MercuryHolidays\Search\Searcher;


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Type Access-Control-Allow-Methods');



// Data Validation
if(!isset($_POST['minimum_budget']) || empty($_POST['minimum_budget'])){
    print json_encode("Minimum Budget required");
    exit;
}elseif(!isset($_POST['maximum_budget']) || empty($_POST['maximum_budget'])){
    print json_encode("Maximum Budget required");
    exit;
}elseif(!isset($_POST['room_number']) || empty($_POST['room_number'])){
    print json_encode("Room number required");
    exit;
}




$minimum = $_POST['minimum_budget'];
$maximum = $_POST['maximum_budget'];
$roomRequired = $_POST['room_number'];

$search = new Searcher();
$result = $search->search($roomRequired, $minimum,$maximum);
print json_encode($result);





