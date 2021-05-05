<?php
require_once("../../../global.php");
include("$root/admin/includes/header.php");
include("$root/admin/includes/sidebar.php");
?>


<?php
$cats = $db->select("*", "cats");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $url ?>admin/pages/index.php">Home</a></li>
                        <li class="breadcrumb-item active">All Categories</li>
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


                <div class="col-12">
                    <div class="card">


                        <?php include_once("$root/admin/includes/msg.php"); ?>


                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cats as $key => $cat) { ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $cat['name']; ?></td>
                                            <td><?= $cat['created_at']; ?></td>
                                            <td>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-3">
                                                        
                                                            <a class="btn btn-danger" name="delete" id="delete" href="<?= $url; ?>admin/controllers/category/handle-delete-cat.php?cat_id=<?= $cat['id']; ?>">Delete</a>
                                                       
                                                            <!-- <form method="POST" action="<?= $url; ?>admin/controllers/category/handle-delete-cat.php">
                                                                <input type="hidden" name="cat_id" value="<?= $cat['id']; ?>">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form> -->
                                                        </div>
                                                        <div class="col-3">
                                                            <form method="POST" action="<?= $url; ?>admin/pages/category/edit-cat.php">
                                                                <input type="hidden" name="cat_id" value="<?= $cat['id'] ?>">
                                                                <button type="submit" class="btn btn-info">Edit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>





        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->





<?php include("$root/admin/includes/footer.php"); ?>