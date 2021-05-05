<?php
require_once("../../../global.php");
require_once("$root/admin/includes/header.php");
require_once("$root/admin/includes/sidebar.php");

$enrolls = $db->selectJoin(" reservations.* , courses.name AS courseName ", "reservations  JOIN courses", "reservations.course_id = courses.id");

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
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>course</th>
                    <th>Created At</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($enrolls as $key => $enroll) { ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $enroll['name']; ?></td>
                      <td><?= $enroll['email']; ?></td>
                      <td><?= $enroll['courseName']; ?></td>
                      <td><?= $enroll['created_at']; ?></td>
                      <td>
                        <div class="container">
                          <div class="row">
                            <div class="col-2">
                              <form method="POST" action="<?= $url; ?>admin/pages/enrollments/show-enrolls.php">
                                <input type="hidden" name="enroll_id" value="<?= $enroll['id']; ?>">
                                <button type="submit"  name="show-enroll" class="btn btn-info">Show</button>
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