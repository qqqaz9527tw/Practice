<?php
require('database.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$city = filter_input(INPUT_POST, 'city',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$countrycode = filter_input(INPUT_POST, 'countrycode',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$district = filter_input(INPUT_POST, 'district',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$population = filter_input(INPUT_POST, 'population',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if($id){
    
}

$update = true;

include('index.php');
?>