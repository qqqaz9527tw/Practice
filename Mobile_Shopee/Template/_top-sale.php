<!-- Top Sale -->
<?php
 
  shuffle($product_shuffle);

  // request method post
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['top_sale_submit'])){
      // call method addtoCart
      $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
  }
?>

<section id="top-sale">
      <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
          <?php foreach($product_shuffle as $item) {?>
          <div class="item py-2">
            <div class="product font-rale">
              <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']);?>"><img src="<?php echo $item['item_image']?? "./asset/product/1.png"; ?>" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6><?php echo $item['item_name']?? "Unknow";?></h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$<?php echo $item['item_price']?? 'O';?></span>
                </div>
                <form method="POST">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']??'1';?>">
                  <input type="hidden" name="user_id" value="<?php echo 1 ;?>">
                  <?php
                    if(in_array($item['item_id'], $Cart->getCartId($product->getData('cart'))??[])){
                      echo '<button type="submit" name="new_phone_submit" class="btn btn-success font-size-12" disabled>In the Cart</button>';
                    }else{
                      echo '<button type="submit" name="new_phone_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                    }
                  ?>
                  
                </form>
              </div>
            </div>
          </div>
          <?php }?>

          <!-- <div class="item py-2">
            <div class="product font-rale">
              <a href="#"><img src="./assets/products/2.png" alt="product2" class="img-fluid"></a>
              <div class="text-center">
                <h6>Readme Note 7</h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$152</span>
                </div>
                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
              </div>
            </div>
          </div> -->

          <!-- <div class="item py-2">
            <div class="product font-rale">
              <a href="#"><img src="./assets/products/3.png" alt="product3" class="img-fluid"></a>
              <div class="text-center">
                <h6>Readme Note 7</h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$152</span>
                </div>
                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
              </div>
              
            </div>
          </div>

          <div class="item py-2">
            <div class="product font-rale">
              <a href="#"><img src="./assets/products/4.png" alt="product4" class="img-fluid"></a>
              <div class="text-center">
                <h6>Samsung Galaxy</h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$152</span>
                </div>
                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
              </div>
            </div>
          </div>

          <div class="item py-2">
            <div class="product font-rale">
              <a href="#"><img src="./assets/products/5.png" alt="product5" class="img-fluid"></a>
              <div class="text-center">
                <h6>Readme Note 7</h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$152</span>
                </div>
                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
              </div>
            </div>
          </div>

          <div class="item py-2">
            <div class="product font-rale">
              <a href="#"><img src="./assets/products/6.png" alt="product6" class="img-fluid"></a>
              <div class="text-center">
                <h6>Samsung Galaxy</h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$152</span>
                </div>
                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
              </div>
            </div>
          </div>

          <div class="item py-2">
            <div class="product font-rale">
              <a href="#"><img src="./assets/products/1.png" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6>Readme Note 7</h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$152</span>
                </div>
                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>