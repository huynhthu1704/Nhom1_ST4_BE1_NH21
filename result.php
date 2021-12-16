<?php include "header.php";
include "component.php";

$type_id = "";
$keyword = "";
$search = array();
$name = array();
$count = array();
$countPro = 0;
$perPage = 6;
$total = 0;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if (isset($_GET['submit'])) {
    $type_id = $_GET['type_id'];
    $keyword = $_GET['keyword'];
    $url = $_SERVER['PHP_SELF'] . "?type_id=$type_id&keyword=$keyword&submit=";
    if ($type_id == 0) {
        $get6Product = $product->get6Product($keyword, $page, $perPage);
        $search = $product->searchAll($keyword);
        $name = $product->getManuName($keyword);
        $count = $product->getCountProduct($keyword);
    } else {
        $get6Product = $product->get6ProductByTypeIdKeyword($type_id, $page, $perPage, $keyword);
        $search = $product->searchNameByTypeIDAndName($keyword, $type_id);
        $name = $product->getManuNameByKeyWord($keyword, $type_id);
        $count = $product->getCountProductByKeyWord($keyword, $type_id);
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
                    <div class="filter">
                        <?php
                        $dem = 0;
                        if (count($name) == 0) {
                            echo "<script>alert('Product not found')</script>";
                            echo "<script>window.location = 'index.php'</script>";
                        }
                        foreach ($name as $value) {
                        ?>
                            <div class="list-item ">
                                <label>
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

                <!-- /aside Widget -->
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>

                    <?php
                    $getTopSelling = $product->getTopSelling();
                    foreach ($getTopSelling as $value) { ?>

                        <?php getOrder($value, $getNewProducts, $discount) ?> <br>

                    <?php } ?>

                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store products -->
                <div class="row">
                    <?php
                    foreach ($get6Product as $value) {
                    ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <?php
                            getProduct($value, $getNewProducts, $discount, $session_wishlist);  ?>
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
                        <?php echo $product->paginate($url, $total, $page, $perPage) ?>
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