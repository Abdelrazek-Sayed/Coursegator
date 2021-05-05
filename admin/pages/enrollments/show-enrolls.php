<?php
require_once("../../../global.php");
require_once("$root/admin/includes/header.php");
require_once("$root/admin/includes/sidebar.php");

 
if ($request->postHas('show-enroll')) {
  $id = $request->post('enroll_id');
  $enrolls = $db->selectJoinOne('reservations.* , courses.name AS courseName', "reservations  JOIN courses", "reservations.course_id = courses.id", "where reservations.id = $id");
} else {
  $session->set('error', 'error .No iD send');
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Reservations</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $url; ?>admin/pages/index.php">Home</a></li>
            <li class="breadcrumb-item active">All Reservations</li>
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
                <div class="card-body">
                  <p><strong> Name : </strong> <?= $enrolls['name']; ?></p>
                  <p><strong> Email : </strong> <?= $enrolls['email']; ?></p>
                  <p><strong> Phone : </strong> <?= $enrolls['phone']; ?></p>
                  <p><strong> Speciality : </strong> <?= $enrolls['spec']; ?></p>
                  <p><strong> Created_at : </strong> <?= $enrolls['created_at']; ?></p>
                </div>

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