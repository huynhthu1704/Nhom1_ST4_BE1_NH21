<?php include "header.php";
include "component.php"?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">WISHLIST</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Wishlist</li>
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
      <div class="row px-5">
            <div class="col-md-8">
                  <div class="shopping-cart">
                        <h2 style="padding: 30px 0 0 0 !important">My Cart</h2>
                        <hr>
                        <?php
                        if ($count != 0) {
                              foreach ($_SESSION['wishlist'] as $value) {
                                    wishlistElement($value['id'], $value['image'], $value['name'], $value['price']);
                              }
                        } else {
                        ?> <h5>YOU HAVEN'T ADDED ANY PRODUCT TO WISHLIST</h5>
                        <?php } ?>

                  </div>
            </div>
      </div>

</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php include "footer.php";?>