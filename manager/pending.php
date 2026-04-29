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
                    $get_pending = mysqli_query($conn, "SELECT * FROM tbl_rentals LEFT JOIN tbl_users ON tbl_users.user_id = tbl_rentals.user_id LEFT JOIN car_brand ON car_brand.brand_id = brand_id WHERE  status = 'Pending'");
                    $pend_num = mysqli_num_rows($get_pending);

                    if ($pend_num >= 1) {
                    ?>
                        <table class="datatable">
                            <thead>
                                <tr>
                                    <th>Valid ID</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                   
                                    <th>Rent Date</th>
                                    <th>Return Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($pend = mysqli_fetch_array($get_pending)) {
                                ?>
                                    <tr>
                                        <td><img src="../customer/assets/uploads/<?php echo $pend['valid_ID'] ?>" class="img-fluid rounded-circle" style="width:75px;height:75px;" data-bs-toggle="modal" data-bs-target="#view<?php echo $pend['rental_id'] ?>"></td>
                                        <td><?php echo $pend['lastname'] ?></td>
                                        <td><?php echo $pend['firstname'] ?></td>
                                        
                                        <td><?php echo $pend['pickup_date'] ?></td>
                                        <td><?php echo $pend['return_date'] ?></td>
                                        <td><?php echo $pend['total_amount'] ?></td>
                                        <td><?php echo $pend['status'] ?></td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#cancel<?php echo $pend['rental_id'] ?>" class="btn btn-danger">
                                                Cancel
                                            </a>
                                            <a href="process.php?rental_id=<?php echo $pend['rental_id'] ?>&approve&model_id=<?php echo $pend['card_id'] ?>" onclick="return confirm('Do you want to confirm this reservation ?')" class="btn btn-success">Approve</a>
                                        </td>


                                    </tr>
                                    <div class="modal" id="view<?php echo $pend['rental_id'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">ID</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="../customer/assets/uploads/<?php echo $pend['valid_ID'] ?>" class="img-fluid">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal" id="cancel<?php echo $pend['rental_id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Cancelation of Reservation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="process.php?rental_id=<?php echo $pend['rental_id'] ?>" method="POST">
                                                        <div class="input-group">
                                                            <div class="input-group-text"></div>
                                                            <input type="text" name="reason" class="form-control" required placeholder="Enter Reason for cancel">
                                                        </div>
                                                 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="cancel" class="btn btn-primary">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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