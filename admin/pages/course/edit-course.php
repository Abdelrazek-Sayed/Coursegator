<?php
require_once("../../../global.php");
require_once("$root/admin/includes/header.php");
require_once("$root/admin/includes/sidebar.php");



if ($request->postHas('edit-course')) {

    $id = $request->post('course_id');
    $imgOldName = $request->post('imgOldName');
    $course = $db->selectOne('*', 'courses', "WHERE id = $id");
    $cats = $db->select('id,name', 'cats');
}

?>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Course</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $url; ?>admin/pages/index.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
                        <li class="breadcrumb-item active">Edit-course</li>
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

                        <form role="form" method="POST" action="<?= $url; ?>admin/controllers/course/handel-update-course.php?id=<?= $course['id']; ?>&imgOldName=<?= $course['img']; ?>" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $course['name']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="desc" rows="3"> <?= $course['desc']; ?> </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="spec">category</label>
                                    <select class="form-control valid" name="cat_id" id="cat_id">
                                        <?php foreach ($cats as $cat) { ?>
                                            <option <?php if ($cat['id'] == $course['cat_id']) {
                                                        echo "selected";
                                                    } ?> value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="img" onchange="readURL(this);" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <img src="<?= $url; ?>/uploads/images/courses/<?= $course['img']; ?>" id="showImage" style="height:150px; width:300px">
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" name="update-course" class="btn btn-primary">Save</button>
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