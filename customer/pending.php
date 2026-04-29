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
        <li class="breadcrumb-item active">Pending transactions</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <div class="card shadow py-2">
        <div class="card-body">

          <?php
          $get_pending = mysqli_query($conn, "SELECT * FROM tbl_rentals LEFT JOIN users ON users.user_id = tbl_rentals.user_id LEFT JOIN cars ON cars.car_id = card_id WHERE users.user_id = '$user_id' AND status = 'Pending'");
          $pend_num = mysqli_num_rows($get_pending);

          if ($pend_num >= 1) {
          ?>
            <table class="datatable">
              <thead>
                <tr>

                  <th>Lastname</th>
                  <th>Firstname</th>
                  
                 
                  <th>Total</th>
                  <th>Rent Date</th>
                  <th>Return Date</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php
                while ($pend = mysqli_fetch_array($get_pending)) {
                ?>
                  <tr>

                    <td><?php echo $pend['lastname'] ?></td>
                    <td><?php echo $pend['firstname'] ?></td>
                    
                    
                    <td><?php echo $pend['total_amount'] ?></td>
                    <td><?php echo $pend['pickup_date'] ?></td>
                    <td><?php echo $pend['return_date'] ?></td>
                    <td><?php echo $pend['status'] ?></td>
                    <td>
                      <?php
                      if ($pend['status'] != 'Pending') {
                      } else {
                      ?>
                        <a href="process.php?rental_id=<?php echo $pend['rental_id'] ?>&&cancel" class="btn btn-danger" onclick="return confirm('Do you want to cancel this transaction?')">Cancel </a>
                      <?php
                      }
                      ?>
                    </td>


                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php

          } else {
          ?>
            <div class="alert alert-danger mt-4" role="alert">
              No transactions yet
            </div>
          <?php
          }


          ?>

        </div>


      </div>


    </div>
  </section>

</main><!-- End #main -->
<?php
include 'inc/footer.php';
?>