<?php include "header.php";
include "component.php";
$typeName = "";
if (isset($_GET['type_id'])) {
    $typeName = $protype->getTypeName($_GET['type_id']);
    $type_id = $_GET['type_id'];
    $getProductByTypeId = $product->getProductByTypeId($type_id);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $perPage = 6;
    $total = count($getProductByTypeId);
    $url = $_SERVER['PHP_SELF'] . "?type_id=$type_id";
    $get6ProductByTypeId = $product->get6ProductByTypeId($type_id, $page, $perPage);
    $getTopSelling = $product->getTopSelling();
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
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><?php echo $typeName . " (" . $total . ") Results" ?></li>
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
                        $name = $product->getManuNameByType($_GET['type_id']);
                        $count = $product->getCountProductByType($_GET['type_id']);
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
                    if (isset($_GET['type_id'])) {

                        foreach ($get6ProductByTypeId as $value) {
                    ?>
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <?php getProduct($value, $getNewProducts, $discount); ?>
                            </div>
                            <!-- /product -->
                            <div class="clearfix visible-sm visible-xs"></div>
                    <?php }
                    } ?>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 3 - 6 products</span>
                    <ul class="store-pagination">
                        <?php echo $product->paginate($url, $total, $page, $perPage) ?>
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