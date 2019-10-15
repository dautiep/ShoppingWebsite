<?php
 $valueurl = $data['urlproduct'];
 //print_r($data['relatedproducts']);

?>
<!--Main container -->
    <div class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <div class="product-view-area">
              <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                <div class="icon-sale-label sale-left">Sale</div>
                <div class="large-image">
                  <a href="public/source/products-images/<?php echo $valueurl->image;?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                    <img class="zoom-img" src="public/source/products-images/<?php echo $valueurl->image; ?>" alt="products"> </a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                <div class="product-name">
                  <h1><?php echo $valueurl->name; ?></h1>
                </div>
                <?php if($valueurl->promotion_price != 0 && $valueurl->promotion_price < $valueurl->price): ?>
                  <div class="price-box">
                  <p class="special-price">
                    <span class="price-label">Special Price</span>
                    <span class="price">
                    <?php
                    $format_number = number_format($valueurl->promotion_price, 0, ",", ".");
                    echo $format_number . "đ"; 
                    ?>
                    </span>
                  </p>
                  <p class="old-price">
                    <span class="price-label"></span>
                    <span class="price">
                    <?php
                    $format_number = number_format($valueurl->price, 0, ",", ".");
                    echo $format_number . "đ"; 
                    ?>
                    </span>
                  </p>
                </div>
                <?php elseif($valueurl->promotion_price == 0 || $valueurl->promotion_price == $value->price): ?>
                <p class="special-price">
                    <span class="price-label">Special Price</span>
                    <span class="price">
                    <?php
                    $format_number = number_format($valueurl->price, 0, ",", ".");
                    echo $format_number . "đ"; 
                    ?>
                    </span>
                  </p>
                <?php endif ?>

                <div class="short-description">
                  <h2>Quick Overview</h2>
                  <?php echo $valueurl->detail; ?>
                </div>

                <div class="product-variation">
                  <form action="#" method="post">
                    <div class="cart-plus-minus">
                      <label for="qty">Quantity:</label>
                      <div class="numbers-row">
                        <div   class="dec qtybutton">
                          <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                          class="inc qtybutton">
                          <i class="fa fa-plus">&nbsp;</i>
                        </div>
                      </div>
                    </div>
                    <button class="button pro-add-to-cart" title="Add to Cart" type="button">
                      <span>
                        <i class="fa fa-shopping-cart"></i> Add to Cart</span>
                    </button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Related Products</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                <?php foreach ($data['relatedproducts'] as $key => $value): ?>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="icon-sale-label sale-left">Sale</div>
                        <div class="icon-new-label new-right">New</div>
                        <div class="pr-img-area">
                          <img class="first-img" src="public/source/products-images/<?php echo $value->image ?>" alt="">
                          <img class="hover-img" src="public/source//products-images/<?php echo $value->image ?>" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="<?php echo $value->url; ?>"><?php echo $value->name; ?></a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <span class="regular-price">
                                  <span class="price">
                                  <?php
                                  $format_number = number_format($value->price, 0, ",", ".");
                                  echo $format_number . "đ";
                                  ?>                                 
                                  </span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product Slider End -->
