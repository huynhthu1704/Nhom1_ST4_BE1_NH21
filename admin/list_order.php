<?php include "header.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 20%">Purchase Date</th>
                            <th style="width: 50%">Name</th>
                            <th style="width: 20%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orderdetails = $orderDetails->getAllOrderDetail();
                        $dem = 0;
                        $tong = 0;
                        foreach ($orderdetails as $value) {
                            $orderItemm = $orderItems->getCountOrderItem($orderdetails[$dem]['order_id']); ?>
                            <td><?php echo "<a href=order_Items.php?order_id=" . $value['order_id'] . " </a>" . $value['order_id']; ?></td>
                            <td><?php echo $value['order_date'] ?></td>
                            <?php if ($orderItemm[0]['dem'] > 1) { ?>
                                <td><?php echo $orderItemm[0]['name'] . " And " . ((int)$orderItemm[0]['dem'] - 1) . " other products" ?></td>
                            <?php } else { ?>
                                <td><?php echo $orderItemm[0]['name'] ?></td>
                            <?php } ?>
                            <td><?php echo number_format($value['total']);
                                $dem = $dem + 1;
                                $tong = $tong + (int)$value['total']; ?></td>
                    </tbody>
                <?php } ?>
                </table>
                <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 80%">Revenue</th>
                        <th style="width: 20%"><?php echo number_format($tong); ?></th>
                    </tr>
                </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>