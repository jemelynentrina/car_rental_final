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

          <!-- Revenue Card -->

        </div><!-- End Revenue Card -->

        <!-- Customers Card -->


      </div><!-- End Customers Card -->


      <!-- Customers Card -->
      <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">


          <div class="card-body">
            <h5 class="card-title">Approved Reservation</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-counter"></i>
              </div>
              <div class="ps-3">
                <h6>1244</h6>


              </div>
            </div>

          </div>
        </div>



      </div><!-- End Customers Card -->

      <!-- Customers Card -->
      <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card">


          <div class="card-body">
            <h5 class="card-title">Client Accounts</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person"></i>
              </div>
              <div class="ps-3">
                <h6>1244</h6>


              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->


      <!-- Customers Card -->
      <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card">


          <div class="card-body">
            <h5 class="card-title">Commision This Day</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person"></i>
              </div>
              <div class="ps-3">
                <h6>1244</h6>


              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->

      <!-- Customers Card -->
      <div class="col-xxl-6 col-xl-12">

        <div class="card info-card customers-card">


          <div class="card-body">
            <h5 class="card-title">Commision This Month</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person"></i>
              </div>
              <div class="ps-3">
                <h6>1244</h6>


              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->

      <!-- Customers Card -->
      <div class="col-xxl-6 col-xl-12">

        <div class="card info-card customers-card">


          <div class="card-body">
            <h5 class="card-title">Commision This Year</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person"></i>
              </div>
              <div class="ps-3">
                <h6>1244</h6>


              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->

      <div class="card">
        <div class="card-body">
          <canvas id="myChart"></canvas>
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


          <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                  label: '# of Votes',
                  data: [12, 19, 3, 5, 2, 3],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
      </div>







    </div>
    </div><!-- End Left side columns -->



    </div>
  </section>

</main><!-- End #main -->
<?php
include 'inc/footer.php';
?>