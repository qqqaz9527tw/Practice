<?php
// $newcity = filter_input(INPUT_POST, "newcity", FILTER_SANITIZE_STRING);
// $countrycode = filter_input(INPUT_POST, "countrycode", FILTER_SANITIZE_STRING);
// $district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_STRING);
// $newpopulation = filter_input(INPUT_POST, "population", FILTER_SANITIZE_STRING);
// $city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_STRING);
//FILTER_SANITIZE_STRING格式化資料成HTML，但php8以上刪除，改成htmlspecialchars()，目前不確定是否可以轉換。

require('model/database.php');
require('model/city_db.php');
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$countrycode = filter_input(INPUT_POST, "countrycode",FILTER_UNSAFE_RAW);
$district = filter_input(INPUT_POST, "district", FILTER_UNSAFE_RAW);
$population = filter_input(INPUT_POST, "population", FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action',FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action',FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'create_read_form';
    } 
}

$city = filter_input(INPUT_POST, "city",FILTER_UNSAFE_RAW);
if(!$city){
    $city = filter_input(INPUT_GET, "city", FILTER_UNSAFE_RAW);
}
//city只要判斷一次就好，如果沒有get跟post會直接回傳error

switch($action){
    case 'select':
        if($city){
            $results = select_city_by_name($city);
            include('view/update_delete_form.php');
        } else {
            $error_message = 'Invalid city data. Check all fields.';
            include('view/error.php');
        }
        break;
        // select case放第一個因為通常select最常被用
    case 'insert':
        if( $city && $countrycode && $district && $population) {
            $count = insert_city($city, $countrycode, $district, $population);
            header("Location: .?action=select&city={$city}&created={$count}");
        } else{
            $error_message = 'Invalid city data. Check all fields.';
            // $error_message = 'Database Error: ';
            // $error_message .= $e->getMessage();
            include('view/error.php');
        }
        break;
    case 'update':
        if($id && $city && $countrycode && $district && $population) {
            $count = update_city($id, $city, $countrycode, $district, $population);
            header("Location: .?action=select&city={$city}&updated={$count}");
        } else{
            $error_message = 'Invalid city data. Check all fields.';
            include('view/error.php');
        }
        break;
    case 'delete':
        if($id){
            $count = delete_city($id);
            header("Location: .?deleted={$count}");
        } else{
            $error_message = 'Invalid city data. Check all fields.';
            include('view/error.php');
        }
        break;
    default:
        include('view/create_read_form.php');
}

?>


