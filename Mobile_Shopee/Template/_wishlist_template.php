<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedrecord = $Cart->deleteCart($_POST['item_id'], 'wishlist');
        
    }
    if(isset($_POST['cart-submit'])){
        $Cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
    }
    
}
?>

<!-- shopping cart -->
<section id="cart" class="py-3 mb-3">
      <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">WishList</h5>
        
        <!-- shopping cart item -->
        <div class="row">
          <div class="col-sm-9">
            <?php
            
            foreach ($product->getData('wishlist') as $item) :
              $cart = $product->getProducts($item['item_id']);
              $subTotal[] = array_map(function($item){
            ?>
            <div class="row border-top py-3 mt-3">
              <div class="col-sm-2">
              <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
              </div>
              <div class="col-sm-8">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name']??"Unknow";?></h5>
                <small>by <?php echo $item['item_brand']??"Samsung";?></small>
                <!-- rating -->
                <div class="d-flex">
                  <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                  </div>
                  <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                </div>
                <!-- quantity -->
                <div class="qty d-flex pt-2">
                  
                <form method="post">
                    <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                    <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger ps-0 pe-3 border-right">Delete</button>
                </form>

                  <form method="post">
                    <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                    <button type="submit" name="cart-submit" class="btn font-baloo text-danger px-3 ">Add to Cart</button>
                  </form>
                  
                </div>
              </div>

              <div class="col-sm-2 text-end">
                <div class="font-size-20 text-danger font-baloo">
                  $ <span class="product_price" data-id="<?php echo $item['item_id']??0;?>"> <?php echo $item['item_price']??0;?></span>
                </div>
              </div>

            </div>
            <?php
              return $item['item_price'];
              }, $cart);
              
              endforeach;
              
            ?>
           
          </div>
        </div>
        
      </div>
    </section>