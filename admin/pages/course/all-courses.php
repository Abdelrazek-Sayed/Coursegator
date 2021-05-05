<?php
require_once("../../../global.php");
require_once("$root/admin/includes/header.php");
require_once("$root/admin/includes/sidebar.php");


$courses = $db->selectJoin(" courses.* ,cats.id as catId ,cats.name as catName ", "courses JOIN cats", "courses.cat_id = cats.id");


// $enroll = $database->selectJoin(" reservations.* , courses.name AS courseName ","reservations  JOIN courses","reservations.course_id = courses.id");
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Courses</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $url; ?>admin/pages/index.php">Home</a></li>
                        <li class="breadcrumb-item active">All courses</li>
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
                                        <th>image</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($courses as $key => $course) { ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $course['name']; ?></td>

                                            <td>
                                                <img src="<?= $url; ?>uploads/images/courses/<?= $course['img']; ?>" height="50px">
                                            </td>

                                            <td><?= $course['catName']; ?></td>
                                            <td><?= $course['created_at']; ?></td>
                                            <td>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <a class="btn btn-danger" name="delete" id="delete" href="<?= $url; ?>admin/controllers/course/handle-delete-course.php?course_id=<?= $course['id']; ?>&&imgOldName=<?= $course['img']; ?>">Delete</a>
                                                        </div>
                                                        <div class="col-2">
                                                            <form method="POST" action="<?= $url; ?>admin/pages/course/edit-course.php">
                                                                <input type="hidden" name="course_id" value="<?= $course['id']; ?>">
                                                                <input type="hidden" name="imgOldName" value="<?= $course['img']; ?>">
                                                                <button type="submit" name="edit-course" class="btn btn-info">Edit</button>
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