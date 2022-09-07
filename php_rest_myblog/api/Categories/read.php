<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $category = new Category($db);

  // category query
  $result = $category->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any category
  if($num > 0) {
    // category array
    $cat_arr = array();
    // $cat_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $cat_item = array(
        'id' => $id,
        'name' => $name
      );

      // Push to "data"
      array_push($cat_arr, $cat_item);
      // array_push($car_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($cat_arr);

  } else {
    // No Categories
    echo json_encode(
      array('message' => 'No Categories Found')
    );
  }
