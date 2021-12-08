<?php include "header.php";
include "component.php";

$type_id = "";
$keyword = "";
$search = array();
$name = array();
$count = array();
$countPro = 0;
$perPage = 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if (isset($_GET['submit'])) {
    $type_id = $_GET['type_id'];
    $keyword = $_GET['keyword'];
    $url = $_SERVER['PHP_SELF'] . "?type_id=$type_id?keyword=$keyword?submit=";
    if ($type_id == 0) {
        $get6Product = $product->get6Product($keyword, $page, $perPage);
        $product->searchAll($keyword);
        $name = $product->getManuName($keyword);
        $count = $product->getCountProduct($keyword);
    } else {
        $get6Product = $product->get6ProductByTypeId($type_id, $page, $perPage);
        $search = $product->getManuNameByKeyWord($keyword, $type_id);
        $count = $product->getCountProductByKeyWord($keyword,$type_id);
    }
    $total = count($search);
    foreach ($count as $value) {
        $countPro += $value['dem'];
    }
}

?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">
                        <?php
                        if (isset($_GET['keyword'])) {
                            echo $_GET['keyword'];
                        } ?> (<?php echo $countPro; ?> Results)</li>
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
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="./img/product01.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="./img/product02.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="./img/product03.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
                    foreach ($search as $value) {
                    ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <?php
                            getProduct($value, $getNewProducts, $discount);  ?>
                        </div>
                        <!-- /product -->
                        <div class="clearfix visible-sm visible-xs"></div>
                    <?php } ?>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 3-6 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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