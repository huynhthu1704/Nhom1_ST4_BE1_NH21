<?php
    function component() {
        $element = '
        <div class="product">
										<div class="product-img">
											<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
										</div>
										<div class="product-body">

											<p class="product-category"><?php echo $product->getTypeName($value['type_id']) ?></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id']  ?>"><?php echo $value['name']; ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']); ?></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>';
    }