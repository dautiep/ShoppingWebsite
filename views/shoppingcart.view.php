<?php 
$value = $data['datacart'];
?>
<!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            
            
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Product</th>
                      <th>Description</th>
                      <!-- <th>Avail.</th> -->
                      <th>Unit price</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data['datacart']->items as $key => $value):?>
                      <tr class='item_cart'>
                        <td class="cart_product"><a href="#"><img src="public/source/products-images/<?php echo $value['item']->image; ?>" alt="Product"></a></td>
                        <td class="cart_description"><p class="product-name"><a href="#"> <?php echo $value['item']->name; ?> </a></p>
                          <!-- <small><a href="#">Color : Red</a></small><br>
                          <small><a href="#">Size : M</a></small></td>
                        <td class="availability in-stock"><span class="label">In stock</span></td> -->
                        <td class="price">
                          <span>
                            <?php 
                               $number_format = number_format($value['item']->promotion_price, 0, ',', '.');
                               echo $number_format.'VND'.'<br>';
                            ?>
                          </span>
                          <del style = "Color:#8888">
                            <?php 
                              $number_format = number_format($value['item']->price, 0, ',', '.');
                              echo $number_format.'VND';
                            ?>
                          </del>
                        </td>
                        <td class="qty"><input class="form-control input-sm" type="text" value="<?php echo $value['qty'] ?>"></td>
                        <td class="price">
                          <span>
                            <?php 
                              $number_format = number_format($value['promotionPrice'], 0, ',', '.');
                              echo $number_format.'VND'; 
                            ?>
                          </span>
                        </td>
                        <td class="action" data-id = "<?php echo $value['item']->id; ?>"><a href="#" ><i class="icon-close"></i></a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Total promotion price</td>
                      <td colspan="2">
                        <?php 
                          $number_format = number_format($data['datacart']->promtPrice, 0, ',', '.');
                          echo $number_format.'VND'; 
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Total price</strong></td>
                      <td colspan="2">
                        <strong>
                          <?php 
                            $number_format = number_format($data['datacart']->totalPrice, 0, ',', '.');
                            echo $number_format.'VND'; 
                          ?>
                        </strong>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>