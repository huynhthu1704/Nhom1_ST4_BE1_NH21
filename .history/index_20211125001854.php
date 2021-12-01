<?php 
//session_start();
include "header.php";
include "component.php";

if (isset($_POST['add-to-cart'])) {
	if (isset($_SESSION['cart'])) {
		$item_arr_id = array_column($_SESSION['cart'], "pro_id");
		if (in_array($_POST['pro_id'], $item_arr_id)) {
			//$_SESSION['cart'][$_POST['pro_id']];
			echo ($_SESSION['cart'][$_POST['pro_id']]['qty']++);
		} else {
			$count = count($_SESSION['cart']);
			$item_arr = array("pro_id" => array($_POST['pro_id'],1));
			$_SESSION['cart'][$count] = $item_arr;
			//var_dump($_SESSION['cart']);
		}
	} else {
		$item_arr = array("pro_id" => array($_POST['pro_id'],1));
							// "qty" => );
		$_SESSION['cart'][0] = $item_arr;
		var_dump($_SESSION['cart']);
	}
}
?>
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/samsung-galaxy-z-flip3-black-org.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Smartphone<br>Collection</h3>
						<a href="products.php?type_id=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/lg-gram-17-i7-17z90pgah78a5-3-600x600.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Laptop<br>Collection</h3>
						<a href="products.php?type_id=2" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/Xiaomi Mi Watch Lite.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>SmartWatches<br>Collection</h3>
						<a href="products.php?type_id=3" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">New Products</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">

							<?php foreach ($getAllProtype as $value) { ?>
								<li><a href="products.php?type_id=<?php echo $value['type_id']; ?>"><?php echo $value['type_name'] ?></a></li>
							<?php } ?>

						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<!-- product -->
								<?php
								$getNewProducts = $product->getNewProducts();
								foreach ($getNewProducts as $value) {
									component($value['pro_image'], $value['type_name'], $value['id'], $value['name'], $value['price']);
								} ?>
								<!-- /product -->
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown">
						<li>
							<div>
								<h3 id="D"></h3>
								<span>Days</span>
							</div>
						</li>
						<li>
							<div>
								<h3 id="H"></h3>
								<span>Hours</span>
							</div>
						</li>
						<li>
							<div>
								<h3 id="M"></h3>
								<span>Mins</span>
							</div>
						</li>
						<li>
							<div>
								<h3 id="S"></h3>
								<span>Secs</span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">hot deal this week</h2>
					<p>New Collection Up to 50% OFF</p>
					<a class="primary-btn cta-btn" href="hotdeal.php">Shop now</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div id="" class="col-md-12">
				<div class="section-title">
					<h3 class="title">SMARTPHONES</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<?php foreach ($getAllProtype as $value) { ?>
								<li><a href="products.php?type_id=<?php echo $value['type_id']; ?>"><?php echo $value['type_name'] ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>

			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<?php
								$smartphones = $product->getSmartphones();
								foreach ($smartphones as $value) {
								?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
												<span class="new">NEW</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $product->getTypeName($value['type_id']) ?></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?><del class="product-old-price">$990.00</del></h4>
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
									</div>
									<!-- /product -->
								<?php } ?>
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">LAPTOPS</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<?php foreach ($getAllProtype as $value) { ?>
								<li><a href="products.php?type_id=<?php echo $value['type_id']; ?>"><?php echo $value['type_name'] ?></a></li>
							<?php } ?>

						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<?php
								$laptops = $product->getLaptops();
								foreach ($laptops as $value) {
								?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
												<span class="new">NEW</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $product->getTypeName($value['type_id']) ?></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?><del class="product-old-price">$990.00</del></h4>
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
									</div>
									<!-- /product -->
								<?php } ?>
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.php"; ?>