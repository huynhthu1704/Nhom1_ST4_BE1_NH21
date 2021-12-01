<!-- NEWSLETTER -->
<div id="newsletter" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter">
					<p>Sign Up for the <strong>NEWSLETTER</strong></p>

					<form action="" method="post">

						<input name="email" class="input" type="email" placeholder="Enter Your Email" required>
						<button name="subscribe" class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
					</form>
					<?php
					$userEmail = "";
					if (isset($_POST['subscribe'])) {
						if (isset($_POST['email'])) {
							$userEmail = $_POST['email'];
							if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
								$subject = "Thanks for subscribing us";
								$message = "Thanks for subscribing to our store. You'll always receive updates from us.";
								$headers = "From: 3tmobile.tdc@gmail.com";
								if (mail($userEmail, $subject, $message, $headers)) {
						?>
									<div>Thanks for subscribing us</div>
								<?php
								}
							} else {
								?>
								<div><?php echo $userEmail ?>is not a valid email address! </div>
					<?php
							}
						}
					}
					?>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						<p>Our mission is to help you pick the best device for you</p>
						<ul class="footer-links">
							<li><a href="ggmap.html"><i class="fa fa-map-marker"></i>53 Vo Van Ngan Str, Linh Chieu Ward</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
							<li><a href="mailto:3tmobile.tdc@gmail.com"><i class="fa fa-envelope-o"></i> 3tmobile.tdc@gmail.com</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							<li><a href="#">Hot deals</a></li>
							<?php
							foreach ($getAllProtype as $value) :
								$protype = new Protype;
								$getAllProtype = $protype->getAllProtype();
							?>
								<li><a href="products.php?type_id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Information</h3>
						<ul class="footer-links">
							<li><a href="ab_AboutUs.php">About Us</a></li>
							<li><a href="ab_ContactUs.php">Contact Us</a></li>
							<li><a href="ab_PrivacyPolicy.php">Privacy Policy</a></li>
							<li><a href="ab_OrdersAndReturns.php">Orders and Returns</a></li>
							<li><a href="ab_Terms&Conditions.php">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Service</h3>
						<ul class="footer-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">View Cart</a></li>
							<li><a href="#">Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="#">Help</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->

	<!-- bottom footer -->
	<div id="bottom-footer" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</span>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/scripts.js"></script>
<script>
	function addCart(id) {
		//preventDefault();
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function() {
		let item = this.responseText.split("#");
		console.log(item[2]);
		 document.getElementById('qty').innerHTML = item[1];
		 document.getElementById('totalPro').innerHTML = item[1];
		 document.getElementById('subtotal').innerHTML = item[0];
		 
		 document.getElementById('cart-list').insertAdjacentHTML("beforeend", item[2]);
		 alert("true");
			//if (document.querySelector('.<?php $className?>') == null) {
				//alert("true -"+<?php echo $className?>);
			//}
		
		}
		xmlhttp.open("GET", "cart-handle.php?id=" + id);
		xmlhttp.send();
	}
</script>
</html>