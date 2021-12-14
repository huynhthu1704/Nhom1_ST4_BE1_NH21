<?php include "header.php";
?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Checkout</li>
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
	<form action="checkout-handle.php" method="post"></form>
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Billing address</h3>
					</div>
					<?php
					$firstname = "";
					$lastname = "";
					$email = "";
					$address = "";
					$city = "";
					$zipcode = "";
					$telephone = "";
					if (isset($_SESSION['user_name'])) {
						$cusInfor = $customer->checkUser($_SESSION['user_name']);
						if (count($cusInfor) == 1) {
							$firstname = $cusInfor[0]['first_name'];
							$lastname = $cusInfor[0]['last_name'];
							$email = $cusInfor[0]['email'];
							$address = $cusInfor[0]['cus_address'];
							$city = $cusInfor[0]['city'];
							$zipcode = $cusInfor[0]['zip_code'];
							$telephone = $cusInfor[0]['phone_number'];
						}
					}
					
					?>
					<div class="form-group">
						<input class="input" type="text" value="<?php echo $firstname;?>" name="first-name" placeholder="First Name">
					</div>
					<div class="form-group">
						<input class="input" type="text" value="<?php echo $lastname;?>" name="last-name" placeholder="Last Name">
					</div>
					<div class="form-group">
						<input class="input" type="email" value="<?php echo $email;?>" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input class="input" type="text" value="<?php echo $address;?>" name="address" placeholder="Address">
					</div>
					<div class="form-group">
						<input class="input" type="text" value="<?php echo $city;?>" name="city" placeholder="City">
					</div>
					<div class="form-group">
						<input class="input" type="text" value="<?php echo $zipcode;?>" name="zip-code" placeholder="ZIP Code">
					</div>
					<div class="form-group">
						<input class="input" type="tel" value="<?php echo $telephone;?>" name="tel" placeholder="Telephone">
					</div>
					<div class="form-group">
						<div class="input-checkbox">
							<input type="checkbox" id="create-account">
							<label for="create-account">
								<span></span>
								Create Account?
							</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
								<input class="input" type="password" name="password" placeholder="Enter Your Password">
							</div>
						</div>
					</div>
				</div>
				<!-- /Billing Details -->

				<!-- Shipping Details -->
				<div class="shiping-details">
					<div class="section-title">
						<h3 class="title">Shiping address</h3>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="shiping-address">
						<label for="shiping-address">
							<span></span>
							Ship to a diffrent address?
						</label>
						<div class="caption">
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>
						</div>
					</div>
				</div>
				<!-- /Shipping Details -->

				<!-- Order notes -->
				<div class="order-notes">
					<textarea class="input" placeholder="Order Notes"></textarea>
				</div>
				<!-- /Order notes -->
			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Your Order</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>PRODUCT</strong></div>
						<div><strong>TOTAL</strong></div>
					</div>
					<div class="order-products">
						<?php if (isset($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $value) {
							?>
						<div class="order-col">
							<div><?php echo $value['qty'] ?> x <?php echo $value['name']?></div>
							<div><?php echo number_format((int)$value['qty'] * (int) $value['price']);?></div>
						</div>
						<?php } ?>
					</div>
					<div class="order-col">
						<div>Shipping</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total"><?php echo number_format($total);?></strong></div>
					</div>
				</div>
				<?php } ?>
				<div class="payment-method">
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-1">
						<label for="payment-1">
							<span></span>
							Direct Bank Transfer
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-3">
						<label for="payment-3">
							<span></span>
							Cash
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="input-checkbox">
					<input type="checkbox" id="terms">
					<label for="terms">
						<span></span>
						I've read and accept the <a href="ab_Terms&Conditions.php">terms & conditions</a>
					</label>
				</div>
				<a type="submit" href="#" class="primary-btn order-submit">Place order</a>
			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.php"; ?>