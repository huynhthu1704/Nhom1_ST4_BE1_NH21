<!-- Rating -->
<div class="col-md-3">
	<div id="rating">
		<div class="rating-avg">
			<span id="average-rating"><?php echo $avarageRating; ?></span>
			<div class="rating-stars product-rating">
				<?php
				for ($i = 1; $i <= round($avarageRating); $i++) {
				?>
					<i class="fa fa-star"></i>
				<?php
				}
				for ($i = 1; $i <= (5 - round($avarageRating)); $i++) {
				?>
					<i class="fa fa-star-o"></i>
				<?php
				}
				?>
			</div>
		</div>
		<ul id="rating-progress-list" class="rating">
			<li>
				<div class="rating-stars">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<div class="rating-progress">
					<div style="width: <?php if ($count != 0) {echo round(($star5 / $count) * 100); } else {echo 0;}?>%"></div>
				</div>
				<span class="sum"><?php echo $star5; ?></span>
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
					<div style="width: <?php if ($count != 0) {echo round(($star5 / $count) * 100); } else {echo 0;}?>%;"></div>
				</div>
				<span class="sum"><?php echo $star4; ?></span>
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
					<div style="width: <?php if ($count != 0) {echo round(($star5 / $count) * 100); } else {echo 0;}?>%"></div>
				</div>
				<span class="sum"><?php echo $star3; ?></span>
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
					<div style="width: <?php if ($count != 0) {echo round(($star5 / $count) * 100); } else {echo 0;}?>%"></div>
				</div>
				<span class="sum"><?php echo $star2; ?></span>
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
					<div style="width: <?php if ($count != 0) {echo round(($star5 / $count) * 100); } else {echo 0;}?>%"></div>
				</div>
				<span class="sum"><?php echo $star1; ?></span>
			</li>
		</ul>
	</div>
</div>
<!-- /Rating -->

<!-- Reviews -->
<div class="col-md-6">
	<div id="reviews">
		<ul id="review-list" class="reviews">
			<?php
			if ($count > 0) {
				foreach ($reviewPro as $value) {
			?>
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
			<?php }
			} ?>
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