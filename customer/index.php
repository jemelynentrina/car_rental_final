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
                <h5 class="card-title">Pending Rentals</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-clockwise"></i>
                  </div>
                  <div class="ps-3">

                  <?php 
                  $pending = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE user_id = '$user_id' AND status = 'Pending' ");
                  ?>
                    <h6><?php echo $pend_num = mysqli_num_rows($pending) ?></h6>


                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">


              <div class="card-body">
                <h5 class="card-title">Approved Rentals</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-check"></i>
                  </div>
                  <div class="ps-3">
                  <?php 
                  $approved = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE user_id = '$user_id' AND status = 'Approved' ");
                  ?>
                    <h6><?php echo $pend_num = mysqli_num_rows($approved) ?></h6>


                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Declined Rentals</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cross"></i>
                  </div>
                  <div class="ps-3">
                  <?php 
                  $canceled = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE user_id = '$user_id' AND status = 'canceled' ");
                  ?>
                  <h6><?php echo $pend_num = mysqli_num_rows($canceled) ?></h6>


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