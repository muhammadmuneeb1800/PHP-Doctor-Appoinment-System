<?php
include "dbconnection.php";
?>


<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">


  <!-- navbar header -->
  <div class="navbar-header">
    <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-search"></span>
    </button>

    <a href="dashboard.php" class="navbar-brand">
      <span class="brand-icon"><i class="fa fa-gg"></i></span>
      <span class="brand-name">DAMS</span>
    </a>
  </div><!-- .navbar-header -->

  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
        <li class="hidden-float hidden-menubar-top">
          <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
          </a>
        </li>
        <li>
          <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
        </li>
      </ul>

      <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-notifications"></i></a>



          <div class="media-group dropdown-menu animated flipInY">
            <?php
            $doc = "SELECT * FROM `doc`";
            $rest = mysqli_query($conn, $doc);
            $now = mysqli_fetch_assoc($rest);
            $sql4 = "SELECT * FROM `appointments` WHERE `specialization` = " . $now['specialization'] . " AND `status` = ''";
            $result4 = mysqli_query($conn, $sql4);
            if (mysqli_num_rows($result4) > 0) {
              $i = 1;
              while ($row = mysqli_fetch_assoc($result4)) {
            ?>
                <a href="view-appointment-detail.php?id=<?= $row['id'] ?>" class="media-group-item">
                  <div class="media">
                    <div class="media-left">
                      <div class="avatar avatar-xs avatar-circle">
                        <img src="assets/images/images.png" alt="">
                        <i class="status status-online"></i>
                      </div>
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading">New Appointment</h5>
                      <small class="media-meta"><?= $row['name'] ?></small>
                  <?php }
              } else {
                echo "<tr><td colspan='7'>No appointment found.</td></tr>";
              } ?>
                    </div>
                  </div>
                </a><!-- .media-group-item -->
          </div>
        </li>

        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-settings"></i></a>
          <ul class="dropdown-menu animated flipInY">
            <li><a href="profile.php"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i>My Profile</a></li>
            <li><a href="change-password.php"><i class="zmdi m-r-md zmdi-hc-lg zmdi-balance-wallet"></i>Change Password</a></li>
            <li><a href="logout.php"><i class="zmdi m-r-md zmdi-hc-lg zmdi-sign-in"></i>Logout</a></li>

          </ul>
        </li>

      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>