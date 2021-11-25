<?php include "header.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Type</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product Type</li>
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
        <h3 class="card-title">Product Type</h3>

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
        <table class="table table-striped projects modify-table">
          <thead>
            <tr>
              <th style="width: 10%">ID</th>
              <th style="width: 20%">Name</th>
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProtypes = $protype->getAllProtypes();
            foreach ($getAllProtypes as $value) { ?>
              <tr>
                <td><?php echo $value['type_id'] ?></td>
                <td><?php echo $value['type_name'] ?></td>
                <td class="project-actions text-left">
                  <a class="btn btn-info btn-sm modify-icon" href="protype_edit.php?type_id=<?php echo $value['type_id'];?>">
                    <i class="fas fa-pencil-alt ">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm modify-icon" href="protype_delete.php?type_id=<?php echo $value['type_id'];?>">
                    <i class="fas fa-trash ">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
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