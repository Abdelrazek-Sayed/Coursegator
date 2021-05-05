<?php
require_once("../../../global.php");
require_once("$root/admin/includes/header.php");
require_once("$root/admin/includes/sidebar.php");


$id = $session->get('adminId');

$admin = $db->selectOne("name,email", "admins", "WHERE id = $id");

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $url; ?>admin/pages/index.php">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="all-cats.php">categories</a></li> -->
            <li class="breadcrumb-item active">Edit</li>
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
          <!-- general form elements -->
          <div class="card card-primary">

            <!-- form start -->
            <?php include_once("$root/admin/includes/msg.php"); ?>



            <form role="form" method="POST" action="<?= $url; ?>admin/controllers/handle-edit-profile.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $admin['name']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= $admin['email']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" name="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" name="confirm_password">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="edit-profile" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>


        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<?php require_once("$root/admin/includes/footer.php"); ?>