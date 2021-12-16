<?php
session_start();
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/discount.php";
require "models/customer.php";
require "models/order_detail.php";
$product = new Product();
$protype = new Protype();
$discount = new Discount();
$customer = new Customer();
$orderDetail = new OrderDetail();
$getNewProducts = $product->getNewProducts();
$count = 0;
if (isset($_SESSION['cart'])) {
	foreach ($_SESSION['cart'] as $value) {
		$count += $value['qty'];
	}
}

$wishlistCount = 0;
$session_wishlist = array();
if (isset($_SESSION['wishlist'])) {
	$wishlistCount = count($_SESSION['wishlist']);
	$session_wishlist = $_SESSION['wishlist'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>3T Mobile</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li>
						<a href="https://www.facebook.com/3TMobile.TDC"><i class="fa fa-facebook"></i>3TMobile</a>
					</li>
					<li><a href="mailto:3tmobile.tdc@gmail.com"><i class="fa fa-envelope-o"></i> 3tmobile.tdc@gmail.com</a></li>
					<li><a href="ggmap.html"><i class="fa fa-map-marker"></i> 53 Vo Van Ngan Str, Linh Chieu Ward</a></li>
				</ul>
				<ul class="header-links pull-right">
					<?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { ?>
						<li><a href="account_information.php"><i class="fa fa-user-o"></i> <?php echo 'Hello! ' . $_SESSION['name'] ?></a></li>
						<li><a href="logout.php"><i class="fa fa-user-o"></i> Logout</a></li>
					<?php } else { ?>
						<li><a href="login.php"><i class="fa fa-user-o"></i> Login</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logo1.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form method="get" action="result.php">
								<select type="id" name="type_id" class="input-select">
									<option value="0">All Categories</option>
									<?php
									$getAllProtype = $protype->getAllProtype();
									foreach ($getAllProtype as $value) { ?>
										<option value="<?php echo $value['type_id'] ?>"> <?php echo $value['type_name'] ?> </option>
									<?php } ?>
								</select>
								<input class="input" placeholder="Search here" name="keyword" required>
								<button type="submit" name="submit" class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div>
								<a href="wishlist.php">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>
									<div id="wishlist-qty" class="qty"><?php echo $wishlistCount ?></div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div id="qty" class="qty"><?php echo $count ?></div>
								</a>
								<div class="cart-dropdown">
									<div id="cart-list" class="cart-list">
										<?php
										$subtotal = 0;
										$total = 0;
										$count = 0;
										if (isset($_SESSION['cart'])) {
											foreach ($_SESSION['cart'] as $value) {
												$count +=  (int) $value['qty'];
												$subtotal += (int) $value['price'] * (int) $value['qty'];
										?>
												<div class="product-widget cart<?php echo $value['id'] ?>">
													<div class="product-img">
														<img src="./img/<?php echo $value['image']; ?>" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name']; ?></a></h3>
														<h4 class="product-price"><span class="qty" id="qty<?php echo $value['id'] ?>"><?php echo $value['qty'] ?></span> x <?php echo number_format($value['price']); ?></h4>
													</div>
													<button onclick="removeProductFrCart(<?php echo $value['id'] ?>, 'remove')" class="delete"><i class="fa fa-close"></i></button>
												</div>

										<?php }
										} ?>
									</div>
									<div class="cart-summary">
										<small><span id="totalPro"><?php echo $count ?></span> Item(s) selected</small>
										<h5 id="subtotal">SUBTOTAL: <?php echo number_format($subtotal);
																	$total = $subtotal;
																	?></h5>
									</div>
									<div class="cart-btns">
										<a href="cart.php">View Cart</a>
										<a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->
	
	<?php include "footer.php"; ?>