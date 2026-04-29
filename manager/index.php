<?php include 'inc/head.php'; ?>

<!-- ======= Header ======= -->
<?php include 'inc/header.php'; ?>
<!-- ======= Sidebar ======= -->
<?php
include 'inc/sidebar.php';
?>
<!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">


              <div class="card-body">
                <h5 class="card-title">Revenue <span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <?php
                    $d = date('d');
                    $get_d = mysqli_query($conn, "SELECT SUM(total_amount) as total FROM tbl_rentals WHERE return_date = CURDATE()");
                    while ($get_d_r = mysqli_fetch_array($get_d)) {
                    ?>
                      <h6><?= $get_d_r['total'] ?></h6>
                    <?php
                    }
                    ?>





                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">


              <div class="card-body">
                <h5 class="card-title">Revenue<span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <?php
                    $m = date('m');
                    $get_m = mysqli_query($conn, "SELECT SUM(total_amount) as total FROM tbl_rentals  WHERE MONTH(return_date) = '$m'");
                    while ($get_m_r = mysqli_fetch_array($get_m)) {
                    ?>
                      <h6><?= $get_m_r['total'] ?></h6>
                    <?php
                    }
                    ?>



                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Revenue <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">

                    <?php

                    $get_year = mysqli_query($conn, "SELECT SUM(total_amount)  as total FROM tbl_rentals  WHERE YEAR(return_date)");
                    while ($get_yr = mysqli_fetch_array($get_year)) {
                    ?>
                      <h6><?= $get_yr['total'] ?></h6>
                    <?php
                    }

                    ?>



                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->


          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Pending Rental</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-counter"></i>
                  </div>
                  <div class="ps-3">
                    <?php $count_pending = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE status ='Pending'") ?>
                    <h6><?php echo mysqli_num_rows($count_pending) ?></h6>


                  </div>
                </div>

              </div>
            </div>



          </div><!-- End Customers Card -->

          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Approved Rental</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-counter"></i>
                  </div>
                  <div class="ps-3">
                    <?php $count_approve = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE status ='Approved'") ?>
                    <h6><?php echo mysqli_num_rows($count_approve) ?></h6>


                  </div>
                </div>

              </div>
            </div>



          </div><!-- End Customers Card -->

          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Cancelled Rental</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-counter"></i>
                  </div>
                  <div class="ps-3">
                    <?php $count_cancel = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE status ='cancel'") ?>
                    <h6><?php echo mysqli_num_rows($count_cancel) ?></h6>


                  </div>
                </div>

              </div>
            </div>



          </div><!-- End Customers Card -->

          <!-- Customers Card -->
          <div class="col-xxl-12 col-xl-12">

            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Accounts</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <?php $count_account = mysqli_query($conn, "SELECT * FROM users ");
                    ?>
                    <h6><?php echo mysqli_num_rows($count_account); ?></h6>

                    <?php
                    ?>



                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->








        </div>
      </div><!-- End Left side columns -->



    </div>
  </section>

</main><!-- End #main -->
<?php
include 'inc/footer.php';
?>