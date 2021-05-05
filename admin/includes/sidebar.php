  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?= $url; ?>/admin/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Coursegator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $url; ?>/admin/assets/img/user-profile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $session->get('adminName');  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i class="fas fa-sitemap nav-icon"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $url; ?>admin/pages/category/all-cats.php" class="nav-link active">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> All Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $url; ?>admin/pages/category/add-cat.php" class="nav-link">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <i class="far fa-plus-square nav-icon"></i>
                  <p> Add Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i class="fas fa-sitemap nav-icon"></i>
              <p>
                Courses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $url; ?>admin/pages/course/all-courses.php" class="nav-link active">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> All Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $url; ?>admin/pages/course/add-course.php" class="nav-link">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <i class="far fa-plus-square nav-icon"></i>
                  <p> Add Course</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= $url; ?>admin/pages/enrollments/enrollments.php" class="nav-link">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <i class="fas fa-users nav-icon"></i>
              <p>
                Enrollments
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?= $url; ?>admin/pages/profile/edit-profile.php" class="nav-link">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <!-- <i class="fas fa-sign-out-alt nav-icon"></i> -->
              <i class="fas fa-user-edit nav-icon"></i>
              <p>
                Edit Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= $url; ?>admin/pages/logout.php" class="nav-link">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>