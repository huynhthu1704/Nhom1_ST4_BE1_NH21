<?php include "header.php";
include "component.php";

$getSaleProduct = $product->getSaleProduct();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 6;
$total = count($getSaleProduct);
$url = $_SERVER['PHP_SELF'];
$get6ProductSale = $product->get6ProductSale($page, $perPage); ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Hot Deal (<?php echo $total; ?> Results)</li>
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
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <?php
                        $name = $product->getManuNameByHotDeal();
                        $count = $product->getCountProductHotDeal();
                        $dem = 0;
                        foreach ($name as $value) {
                        ?>
                            <div class="list-item checkbox">
                                <label><input type="checkbox" value="<?php echo $value['manu_name']; ?>" id="<?php echo $value['manu_name']; ?>">
                                    <span></span>
                                    <?php echo $value['manu_name']; ?>
                                    <small> <?php echo "(" . $count[$dem]['dem'] . ")";
                                            $dem = $dem + 1; ?> </small>
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-body">
                            <?php
                            $getTopSelling = $product->getTopSelling();
                            foreach ($getTopSelling as $value) { ?>

                                <?php getOrder($value, $getNewProducts, $discount) ?> <br>

                            <?php } ?>

                        </div>
                    </div>

                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">3</option>
                                <option value="1">6</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <?php

                    foreach ($get6ProductSale as $value) {
                    ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <?php getProduct($value, $getNewProducts, $discount, $session_wishlist) ?>
                        </div>
                        <!-- /product -->
                        <div class="clearfix visible-sm visible-xs"></div>
                    <?php } ?>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 3 - 6 products</span>
                    <ul class="store-pagination">
                        <?php echo $product->paginateForHotDeal($url, $total, $page, $perPage) ?>
                        <!-- <li><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.php"; ?>