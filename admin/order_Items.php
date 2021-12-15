<?php include "header.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Detail</li>
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
                <h3 class="card-title">Order Detail</h3>

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
                            <th style="width: 30%">Name</th>
                            <th style="width: 20%">Image</th>
                            <th style="width: 20%">Price</th>
                            <th style="width: 10%">Quantity</th>
                            <th style="width: 20%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $order = $orderItems->getOrderById($_GET['order_id']);
                    $tong=0;
                     foreach ($order as $value) { ?>
                  <td><?php echo $value['name'] ?></td>
                  <td><img src="../img/<?php echo $value['image'] ?>" style="background-color:inherit" width="100px" alt=""></td>
                  <td><?php echo number_format($value['price']) ?></td>
                  <td><?php echo $value['qty'] ?></td>
                  <td><?php  echo number_format(((int)$value['price']*(int)$value['qty']));$tong=$tong+((int)$value['price']*(int)$value['qty']); ?> </td>
                    </tbody>
                    <?php }?>
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