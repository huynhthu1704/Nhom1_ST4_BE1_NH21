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
							<li><a href="account_information.php">My Account</a></li>
							<li><a href="cart.php">View Cart</a></li>
							<li><a href="wishlist.php">Wishlist</a></li>
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
	function addCart(id, qty) {
		// nếu số lượng = 0 tức là sản phẩm đang được add từ input, kiểm tra input nhập vào có đủ sản phẩm hay không
		if (qty == 0) {
			let proID = 'pro' + id;
			qty = Number(document.getElementById(proID).value);
			document.getElementById(proID).value = 1;
		}
		// Kiểm tra số lượng sản phẩm đã thêm vào
		let addedQty = 0;
		if (document.getElementById('qty' + id)) {
			addedQty = Number(document.getElementById('qty' + id).innerHTML);
		}
		// Kiểm tra sản phẩm trong kho
		let qtyInStock = 0;
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function() {
			qtyInStock = Number(this.responseText);
			// Nếu sản phẩm định thêm vào + đã thêm > sp trong kho thì thông báo hết hàng
			if ((qty + addedQty > qtyInStock)) {
				alert("Out of stock");
				// ngược lại thêm vào session và thay đổi hiển thị cho phù hợp
			} else {
				xmlhttp.onload = function() {
					let item = this.responseText.split("#");
					document.getElementById('qty').innerHTML = item[1];
					document.getElementById('totalPro').innerHTML = item[1];
					document.getElementById('subtotal').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					if (document.getElementById('price-detail-subtotal')) {
						document.getElementById('price-detail-subtotal').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
						document.getElementById('price-detail-total').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
						document.getElementById('price-detail-qty').innerHTML = item[1];
					}
					let proQty = item[2];
					let cartList = document.getElementById('cart-list');
					let check = document.getElementById(proQty);
					if (check && check !== 'null' && check !== 'undefined') {
						let sl = Number(check.innerHTML);
						check.innerHTML = sl + qty;
					} else {
						cartList.insertAdjacentHTML("beforeend", item[3]);
					}
				}
				xmlhttp.open("GET", "cart-handle.php?id=" + id + "&pro-qty=" + qty);
				xmlhttp.send();
			}
		}
		xmlhttp.open("GET", "check-product-qty.php?id=" + id);
		xmlhttp.send();
		xmlhttp.send();

	}

	function addToWishlist(id) {
		let wlID = "h" + id;
		let wlItem = document.querySelectorAll("." + wlID);
		//for (let i = 0; i < wlID.length; i++) {
		let xmlhttp = new XMLHttpRequest();
		if (wlItem[0].classList.contains("wishlist-icon-color-change")) {
			xmlhttp.onload = function() {
				document.getElementById('wishlist-qty').innerHTML = this.responseText;
			}
			xmlhttp.open("GET", "wishlist-remove.php?id=" + id);
			xmlhttp.send();
		} else {
			xmlhttp.onload = function() {
				document.getElementById('wishlist-qty').innerHTML = this.responseText;
			}
			xmlhttp.open("GET", "wishlist-handle.php?id=" + id);
			xmlhttp.send();
		}
		for (let i = 0; i < wlItem.length; i++) {
			wlItem[i].classList.toggle('wishlist-icon-color-change');
		}
	}

	function removeProductFrWL(id) {
		let wlId = "wl" + id;
		let wlElement = document.getElementById(wlId);
		wlElement.parentNode.removeChild(wlElement);
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function() {
			document.getElementById('wishlist-qty').innerHTML = this.responseText;
		}
		xmlhttp.open("GET", "wishlist-remove.php?id=" + id);
		xmlhttp.send();
	}

	function removeProductFrCart(id, action) {
		if (action == "remove") {
			let cartId = "cart" + id;
			let cartElement = document.querySelectorAll("." + cartId);
			for (let i = 0; i < cartElement.length; i++) {
				cartElement[i].parentNode.removeChild(cartElement[i]);
			}
		}
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function() {
			let item = this.responseText.split("#");
			let qty = Number(item[1]);
			document.getElementById('qty').innerHTML = item[1];
			document.getElementById('totalPro').innerHTML = item[1];
			document.getElementById('subtotal').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			if (document.getElementById('price-detail')) {
				if (qty == 0) {
					document.getElementById('price-detail').remove();
				} else {
					document.getElementById('price-detail-subtotal').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
					document.getElementById('price-detail-total').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
					document.getElementById('price-detail-qty').innerHTML = item[1];
				}
			}
		}
		xmlhttp.open("GET", "cart-remove.php?id=" + id + "&action=" + action);
		xmlhttp.send();
	}

	function decreaseQty(id) {
		let pID = 'pro' + id;
		let qty = Number(document.getElementById(pID).value);
		if (qty == 1) {
			let choice = confirm("Do you want to delete this product?");
			if (choice) {
				removeProductFrCart(id, "remove");
			}
		} else {
			document.getElementById(pID).value = qty - 1;
			removeProductFrCart(id, "decrease");
			let itemDecrease = document.getElementById('qty' + id);
			let itemDecQty = Number(itemDecrease.innerHTML);
			itemDecrease.innerHTML = itemDecQty - 1;
		}
	}


	function increaseQty(id) {
		let pID = 'pro' + id;
		let qty = Number(document.getElementById(pID).value);
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function() {
			let qtyInStock = Number(this.responseText);
			if (qty >= qtyInStock) {
				alert("Sorry, out of stock");
			} else {
				document.getElementById(pID).value = qty + 1;
				addCart(id, 1);
			}
		}
		xmlhttp.open("GET", "check-product-qty.php?id=" + id);
		xmlhttp.send();
	}

	function checkQty(id) {
		let pID = 'pro' + id;
		let qty = Number(document.getElementById(pID).value);
		if (qty == 0) {
			let choice = confirm("Do you want to delete this product?");
			if (choice) {
				removeProductFrCart(id, "remove");
			}
		} else if (qty < 0) {
			alert("Sorry, quantity is not valid");
			document.getElementById(pID).value = 1;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function() {
				let qtyInStock = Number(this.responseText);
				if (qty >= qtyInStock) {
					alert("Sorry, stock just have " + qtyInStock + " product left");
					document.getElementById(pID).value = document.getElementById('qty' + id).innerHTML;
				} else {
					modifyCart(id, qty);
					document.getElementById('qty' + id).innerHTML = document.getElementById(pID).value;

				}
			}
			xmlhttp.open("GET", "check-product-qty.php?id=" + id);
			xmlhttp.send();
		}
	}

	function checkQtyDetail(id) {
		let pID = 'pro' + id;
		let qty = Number(document.getElementById(pID).value);
		if (qty < 0) {
			alert("Sorry, quantity is not valid");
			document.getElementById(pID).value = 1;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function() {
				let addedQty = 0;
				let qtyInStock = Number(this.responseText);
				if (document.getElementById('qty' + id)) {
					addedQty = Number(document.getElementById('qty' + id).innerHTML);
				}
				if ((qty + addedQty) > qtyInStock) {
					alert("Sorry, stock just have " + (qtyInStock - addedQty) + " product left");
					document.getElementById(pID).value = qtyInStock - addedQty;
				} else if ((qty + addedQty) > qtyInStock == 0) {
					alert("Sorry, out of stock");
					document.getElementById(pID).disabled = true;
				}
			}
			xmlhttp.open("GET", "check-product-qty.php?id=" + id);
			xmlhttp.send();
		}
	}

	function checkStock(id) {
		let qty = 0;
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function() {
			qty = Number(this.responseText);
		}
		xmlhttp.open("GET", "check-product-qty.php?id=" + id);
		xmlhttp.send();
		return qty;
	}

	function modifyCart(id, qty) {
		let pID = 'pro' + id;
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function() {
			let item = this.responseText.split("#");
			document.getElementById('qty').innerHTML = item[1];
			document.getElementById('totalPro').innerHTML = item[1];
			document.getElementById('subtotal').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			document.getElementById('price-detail-subtotal').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
			document.getElementById('price-detail-total').innerHTML = item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
			document.getElementById('price-detail-qty').innerHTML = item[1];
		}
		xmlhttp.open("GET", "cart-modify.php?id=" + id + "&qty=" + qty);
		xmlhttp.send();
	}
</script>

</html>