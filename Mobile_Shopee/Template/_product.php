
<!-- product -->
<?php
  $item_id = $_GET['item_id']??1;
  foreach($product->getData() as $item):
    if($item['item_id']==$item_id):

  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['product_submit'])){
      // call method addtoCart
      $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
  }
?>
<section id="product" class="py-3">

    <div class="container">
      <div class="row">
        <!-- product picture -->
        <div class="col-sm-6">
          <img src="<?php echo $item['item_image']??"./assets/products/1.png";?>" alt="product" class="img-fluid">
          <div class="row pt-4 font-size-16 font-baloo">
            <div class="col">
              <button type="submit" class="btn btn-danger form-control">Proceed to buy</button>
            </div>
            <div class="col">
            <form method="POST">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']??'1';?>">
                  <input type="hidden" name="user_id" value="<?php echo 1 ;?>">
                  <?php
                    if(in_array($item['item_id'], $in_cart??[])){
                      echo '<button type="submit" name="product_submit" class="btn btn-success font-size-16 form-control" disabled>In the Cart</button>';
                    }else{
                      echo '<button type="submit" name="product_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                    }
                  ?>
                </form>
            </div>
          </div>
        </div>
        <!-- product detail -->
        <div class="col-sm-6 py-5">
          <h5 class="font-baloo font-size-20"><?php echo $item['item_name']??"Unknow";?></h5>
          <small>by <?php echo $item['item_brand']??"Brand";?></small>
          <div class="d-flex">
            <div class="rating text-warning font-size-12">
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="far fa-star"></i></span>
            </div>
            <a href="#" class="px-2 font-rale font-size-12">20,534 ratings | 1000+ answered questions</a>
          </div>
          <hr class="m-0">

          <!-- product price -->
          <table class="my-3">
            <tr class="font-rale font-size-14">
              <td>M.R.P</td>
              <td><strike>$162.00</strike></td>
            </tr>
            <tr class="font-rale font-size-14">
              <td>Deal Price:</td>
              <td class="font-size-20 text-danger">$<span><?php echo $item['item_price']??0;?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
            </tr>
            <tr class="font-rale font-size-14">
              <td>You Save:</td>
              <td>$<span class="font-size-16 text-danger">10.00</span></td>
            </tr>
          </table>

          <!-- policy -->
          <div id="policy">
            <div class="d-flex">
              <div class="return text-center me-5">
                <div class="font-size-20 my-2 color-second">
                  <span class="fas fa-retweet border p-3 rounded-pill"></span>
                </div>
                <a href="#" class="font-rale font-size-12">10 Days <br>Replacement</a>
              </div>
              <div class="delivery text-center me-5">
                <div class="font-size-20 my-2 color-second">
                  <span class="fas fa-truck border p-3 rounded-pill"></span>
                </div>
                <a href="#" class="font-rale font-size-12">Andy <br>Delivery</a>
              </div>
              <div class="Warranty text-center me-5">
                <div class="font-size-20 my-2 color-second">
                  <span class="fas fa-check-double border p-3 rounded-pill"></span>
                </div>
                <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
              </div>
            </div>
          </div>
          <hr>

          <!-- order details -->
          <div id="order-details" class="font- rale de-flex flex-column text-dark">
            <small>Delivery by: Nov 02 - Nov 09. </small><br>
            <small>Sold by:<a href="#">Andy Electronics</a>(4.5 out of 5 | 18,198 ratings)</small><br>
            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp; Delivery to Customer - 123456</small>
          </div>

          <!-- color switch -->
          <div class="row ">
            <!-- color -->
            <div class="col-6">
              <div class="color my-3">
                <div class="d-flex justify-content-between">
                  <h6 class="font-baloo">Color:</h6>
                  <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                  <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                  <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                </div>
              </div>
            </div>
            <!-- quantity -->
            <div class="col-6">
              <div class="qty d-flex">
                <h6 class="font-baloo">Qty:</h6>
                <div class="px-4 d-flex font-rale">
                  <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                  <input type="text" data-id="pro1" class="qty-input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                  <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                </div>
              </div>
            </div>
          </div>

          <!-- size -->
          <div class="size my-3">
            <h6 class="font-baloo">Size:</h6>
            <div class="d-flex justify-content-between w-75">
              <div class="font-rubik border p-2">
                <button class="btn p-0 font-size-14">4GB RAM</button>
              </div>
              <div class="font-rubik border p-2">
                <button class="btn p-0 font-size-14">6GB RAM</button>
              </div>
              <div class="font-rubik border p-2">
                <button class="btn p-0 font-size-14">8GB RAM</button>
              </div>
            </div>
          </div>
        </div>
        <!-- product description -->
        <div class="col-12">
          <h6 class="font-rubik">Product Description</h6>
          <hr>
          <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eligendi natus esse pariatur, reprehenderit tempora cum delectus a nulla deserunt consequuntur enim iste deleniti accusantium iure tempore, voluptates at eos?</p>
          <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eligendi natus esse pariatur, reprehenderit tempora cum delectus a nulla deserunt consequuntur enim iste deleniti accusantium iure tempore, voluptates at eos?</p>
        </div>

      </div>
    </div>
   </section>

<?php
  endif;
endforeach;
?>

