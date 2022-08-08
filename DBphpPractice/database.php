<?php
$dsn = 'mysql:host=localhost;dbname=world'; //dsn=data source name
$username = 'root';
// $password = '9527';

try{
    $db = new PDO($dsn, $username);
    //$db = new PDO($dsn, $username, $password);
}catch (PDOException $e){
    $error_message = 'Database Error: ';
    $error_message .= $e->getMessage();
    echo $error_message;
    exit();
}
?>