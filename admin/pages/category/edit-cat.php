<?php
require_once("../../../global.php");
include("$root/admin/includes/header.php");
include("$root/admin/includes/sidebar.php");

if ($request->post('cat_id')) {
    $id = $request->post('cat_id');

    $cat = $db->selectOne("name", "cats", "WHERE id= $id");
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $url; ?>/admin/pages/index.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
                        <li class="breadcrumb-item active">Edit-Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-card-primary">

                        <?php include_once("$root/admin/includes/msg.php"); ?>


                        <form method="POST" action="<?= $url; ?>admin/controllers/category/handle-update-cat.php?id=<?= $id; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?= $cat['name']; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="update" class="btn btn-info">Update</button>
                            </div>

                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div> <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include("$root/admin/includes/footer.php"); ?>