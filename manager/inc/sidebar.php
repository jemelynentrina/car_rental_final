<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-item active">
      <a class="nav-link" href="cars.php">
        <i class="bi bi-grid"></i>
        <span>Cars</span>
      </a>
    </li><!-- End Dashboard Nav -->

    
    <li class="nav-item active">
      <a class="nav-link" href="car_brand.php">
        <i class="bi bi-grid"></i>
        <span>Car Brand</span>
      </a>
    </li><!-- End Dashboard Nav -->





    <li class="nav-item">
      <a class="nav-link " href="pending.php">
        <i class="bi bi-person"></i>
        <?php
        $get_pending = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE status = 'Pending'");
        ?>
        <span>Pending Rental <sup class="badge bg-danger"><?php echo mysqli_num_rows($get_pending) ?></sup></span>
        <?php
        ?>

      </a>
    </li><!-- End Dashboard Nav -->



    <li class="nav-item">
      <a class="nav-link " href="approved.php">
        <i class="bi bi-person"></i>
        <span>Approved Rental</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link " href="cancelled.php">
        <i class="bi bi-person"></i>
        <span>Cancelled Rental</span>
      </a>
    </li><!-- End Dashboard Nav -->


  </ul>

</aside>