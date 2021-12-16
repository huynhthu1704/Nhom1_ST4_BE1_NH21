<?php include "header.php";
include "component.php";
include "models/reviews.php";
$review = new Review();
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
						<?php
						$reviewPro = $review->getAllReviewByProductID($getProduct['id']);
						$avarageRating = 0;
						$count = count($reviewPro);
						$totalStar = 0;
						foreach ($reviewPro as $value) {
							$totalStar += $value['rating'];
						}
						if ($count > 0) {
							$avarageRating = round($totalStar / $count, 1);
						}
						?>
						<div>
							<div class="product-rating">
								<?php if ($count > 0) {
									for ($i = 1; $i <= round($avarageRating); $i++) { ?>
										<i class="fa fa-star"></i>
									<?php }
									for ($i = 1; $i <= (5 - round($avarageRating)); $i++) {
									?>
										<i class="fa fa-star-o"></i>
									<?php } ?>

								<?php } ?>
							</div>
							<a class="review-link" href="#tab2"><span class="total-review"><?php echo count($reviewPro) ?></span> (s) | Add your review</a>
						</div>
						<?php  ?>
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
								<a class="h<?php echo $getProduct['id'] . " " . $icon_color_change ?>" style="cursor:pointer" onclick="addToWishlist(<?php echo $getProduct['id']; ?>)">
									<i class="fa fa-heart-o"></i> add to wishlist</a>
							</li>
						</ul>

						<ul class="product-links">
							<li>Category:</li>
							<li><a href="products.php?type_id=<?php echo $getProduct['type_id'] ?>"><?php echo $getProduct['type_name'] ?></a></li>
						</ul>
						<input type="hidden" id="pro-id" name="pro-id" value="<?php echo $_GET['id']; ?>">
					</div>
				</div>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							<li><a data-toggle="tab" href="#tab2">Reviews (<span id="total-review"><?php echo $count ?></span>)</a></li>
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
									<?php if ($count != 0) { ?>
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span id="average-rating"><?php echo $avarageRating; ?></span>
													<div class="rating-stars product-rating">
														<?php if ($count > 0) {
															for ($i = 1; $i <= round($avarageRating); $i++) { ?>
																<i class="fa fa-star"></i>
															<?php }
															for ($i = 1; $i <= (5 - round($avarageRating)); $i++) {
															?>
																<i class="fa fa-star-o"></i>
															<?php } ?>

														<?php } ?>
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
													<?php foreach ($reviewPro as $value) { ?>
														<li>
															<div class="review-heading">
																<h5 class="name"><?php echo $value['name']; ?></h5>
																<p class="date"><?php echo $value['time']; ?></p>
																<div class="review-rating">
																	<?php
																	for ($i = 0; $i < $value['rating']; $i++) { ?>
																		<i class="fa fa-star"></i>
																	<?php }
																	for ($i = 0; $i < (5 - $value['rating']); $i++) {
																	?>
																		<i class="fa fa-star-o"></i>
																	<?php } ?>

																</div>
															</div>
															<div class="review-body">
																<p><?php echo $value['content']; ?></p>
															</div>
														</li>
													<?php } ?>
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
									<?php } else { ?>
										<div class="col-md-9">
											<h4 style="text-align: center">No reviews to show</h4>
										</div>

									<?php } ?>
									<!-- Review Form -->
									<div class="col-md-3">
										<div id="review-form">
											<div class="review-form">
												<input class="input" type="text" name="review_name" id="review_name" placeholder="Your Name" required>
												<input class="input" type="email" name="review_email" id="review_email" placeholder="Your Email" required>
												<textarea class="input" name="content" id="content" placeholder="Your Review"></textarea>
												<div class="input-rating">
													<span>Your Rating: </span>
													<div class="stars">
														<input onchange="rating()" class="rating-star" id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
														<input class="rating-star" id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
														<input class="rating-star" id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
														<input class="rating-star" id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
														<input class="rating-star" id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														<input type="hidden" name="rating" id="rating-star-count" value="-1">
													</div>
													<script>
														if (document.querySelector('input[name="rating"]')) {
															document.querySelectorAll('input[name="rating"]').forEach((elem) => {
																elem.addEventListener("change", function(event) {
																	var item = event.target.value;
																	document.getElementById('rating-star-count').value = item;
																});
															});
														}
													</script>
												</div>
												<div id="noti"></div>
												<button name="add-review" id="add-review" class="primary-btn" onclick="addReview()">Submit</button>
											</div>
										</div>
									</div>
									<!-- /Review Form -->
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