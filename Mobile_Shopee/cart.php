<?php
ob_start();
 include('header.php');
?>

<?php 
    count($product->getData('cart'))?include('Template/_cart-template.php') : include('Template/notfound/_cart_notFound.php');
    count($product->getData('wishlist'))?include('Template/_wishlist_template.php') : include('Template/notfound/_wishlist_notFound.php');
    include('Template/_new-phone.php'); 

?>

<?php include('footer.php');?>