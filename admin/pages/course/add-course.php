<?php
require_once("../../../global.php");
require_once("$root/admin/includes/header.php");
require_once("$root/admin/includes/sidebar.php");


$cats = $db->select('id , name', "cats");

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Course</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $url; ?>admin/pages/index.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
                        <li class="breadcrumb-item active">Add-Course</li>
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
                        <form method="POST" action="<?= $url; ?>admin/controllers/course/handel-add-course.php" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="spec">category</label>
                                    <select class="form-control valid" name="cat_id" id="cat_id">
                                        <?php foreach ($cats as $cat) { ?>
                                            <option value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="exampleInputFile">choose image</label>
                                            <input type="file" class="custom-file-input" name="img" onchange="readURL(this);" id="exampleInputFile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <img src="#" id="showImage" alt="">
                            </div><br>
                            <div class="card-footer">
                                <button type="submit" name="add-course" class="btn btn-primary text-center">Add</button>
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