<?php include "header.php";
include "component.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$getProduct = $product->getProductById($id)[0];
	$typeName = $protype->getTypeName($getProduct['type_id']);
?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php?type_id=<?php echo $getProduct['type_id']; ?>"><?php echo $typeName ?></a></li>
						<li class="active"><?php echo $getProduct['name']; ?></li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<div class="product-preview">
							<img src="./img/<?php echo $getProduct['pro_image'] ?>" alt="">
						</div>

					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						<div class="product-preview">
							<img src="./img/<?php echo $getProduct['pro_image'] ?>" alt="">
						</div>
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name"><?php echo $getProduct['name'] ?></h2>
						<div>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<a class="review-link" href="#">10 Review(s) | Add your review</a>
						</div>
						<div>
							<?php
							$price = $getProduct['price'];
							$discount_price = 0;
							if ($discount->getDiscountByID(($getProduct['discount_id']))) {
								$dis_Percent = (int) $discount->getDiscountByID(($getProduct['discount_id']))[0]['dis_percent'];
								$discount_price = (int) ($price - $price * $dis_Percent / 100);
							} ?>
							<h3 class="product-price"><?php echo number_format($getProduct['price']) ?> <del class="product-old-price"><?php if ($discount_price != 0) {
																																			echo $discount_price;
																																		} ?></del></h3>
							<span class="product-available">In Stock</span>
						</div>
						<p><?php echo $getProduct['description'] ?> </p>

						<div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input oninput="checkQtyDetail(<?php echo $getProduct['id']; ?>)" id="pro<?php echo $getProduct['id'] ?>" type="number" value="1" min="1" max="<?php echo $getProduct['quantity'] ?>">
									<span onclick="checkQtyDetail(<?php echo $getProduct['id']; ?>)" class="qty-up">+</span>
									<span onclick="checkQtyDetail(<?php echo $getProduct['id']; ?>)" class="qty-down">-</span>
								</div>
							</div>
							<button onclick="addCart(<?php echo $getProduct['id']; ?>, 0)" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>

						<?php
						$icon_color_change = "";
						if (isset($_SESSION['wishlist'])) {
							foreach ($_SESSION['wishlist'] as $value) {
								if ($value['id'] == $getProduct['id']) {
									$icon_color_change = "wishlist-icon-color-change";
								}
							}
						} ?>
						<ul class="product-btns">
							<li>
								<a class="h<?php echo $getProduct['id']. " " . $icon_color_change ?>" style="cursor:pointer" onclick="addToWishlist(<?php echo $getProduct['id']; ?>)">
									<i class="fa fa-heart-o"></i> add to wishlist</a>
							</li>
						</ul>

						<ul class="product-links">
							<li>Category:</li>
							<li><a href="products.php?type_id=<?php echo $getProduct['type_id'] ?>"><?php echo $getProduct['type_name'] ?></a></li>
						</ul>

					</div>
				</div>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							<li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
						</ul>
						<!-- /product tab nav -->
						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p><?php echo $getProduct['description'] ?></p>
									</div>
								</div>
							</div>
							<!-- /tab1  -->

							<!-- tab2  -->
							<div id="tab2" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<div class="col-md-3">
										<div id="rating">
											<div class="rating-avg">
												<span>4.5</span>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<ul class="rating">
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 80%;"></div>
													</div>
													<span class="sum">3</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 60%;"></div>
													</div>
													<span class="sum">2</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Rating -->

									<!-- Reviews -->
									<div class="col-md-6">
										<div id="reviews">
											<ul id="review-list" class="reviews">
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem </p>
													</div>
												</li>
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem </p>
													</div>
												</li>

											</ul>
											<ul class="reviews-pagination">
												<li class="active">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- /Reviews -->

									<!-- Review Form -->
									<div class="col-md-3">
										<div id="review-form">
											<form class="review-form">
												<input class="input" type="text" name="review_name" id="review_name" placeholder="Your Name">
												<input class="input" type="email" name="review_email" id="review_email" placeholder="Your Email">
												<textarea class="input" name="content" id="content" placeholder="Your Review"></textarea>
												<div class="input-rating">
													<span>Your Rating: </span>
													<div class="stars">
														<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
														<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
														<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
														<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
														<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
													</div>
												</div>
												<div id="noti"></div>
												<button name="add-review" id="add-review" class="primary-btn" onclick="addReview()">Submit</button>
											</form>
										</div>
									</div>
									<!-- /Review Form -->
									<script>
										function addReview() {
											//alert("hi");
											let review_name = document.getElementById('review_name').value;
											let review_email = document.getElementById('review_email').value;
											let content = document.getElementById('content').value;
											let product_id = <?php echo $_GET['id'] ?>
											let xmlhttp = new XMLHttpRequest();
											xmlhttp.onload = function() {
												 document.getElementById('review-list').insertAdjacentHTML = this.responseText;
											}
											xmlhttp.open("GET", "review-handle.php?name=" + review_name + "&email=" + review_email + "&rv_content=" + content + "&rating=0&product_id=" + product_id);
											xmlhttp.send();
										}
									</script>
								</div>
							</div>
							<!-- /tab3  -->
						</div>
						<!-- /product tab content  -->
					</div>
				</div>
				<!-- /product tab -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Related Products</h3>
					</div>
				</div>

				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<!-- product -->
									<?php
									$getRelevantProducts = $product->searchNameByTypeID($getProduct['type_id']);
									foreach ($getRelevantProducts as $value) {
										getProduct($value, $getNewProducts, $discount, $session_wishlist);
									} ?>
									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<div class="clearfix visible-sm visible-xs"></div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->

<?php
	include "footer.php";
} ?>