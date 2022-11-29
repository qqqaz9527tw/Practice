 <?php
 // require MyQSQL
 require ('database/DBController.php');
 require ('database/Product.php');
 require ('database/cart.php');

 //DBCon Object
 $db = new DBController();

//  Product Object
 $product = new Product($db);
 $product_shuffle = $product->getData();

// Cart Object
$Cart = new Cart($db);

 ?>