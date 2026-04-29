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
                    $get_pending = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE status = 'cancel'");
                    $pend_num = mysqli_num_rows($get_pending);
                    
           

                    if ($pend_num >= 1) {
                    ?>
                        <table class="datatable">
                            <thead>
                                <tr>

                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Car Name</th>
                                  
                                    <th>Total</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                          

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($pend = mysqli_fetch_array($get_pending)) {
                                             $get_user = mysqli_query($conn,"SELECT * FROM tbl_users WHERE user_id =  {$pend['user_id']}");
                                             while($user = mysqli_fetch_array($get_user)){
                                                $get_car = mysqli_query($conn,"SELECT * FROM car_model WHERE model_id = {$pend['card_id']}");
                                                while($car = mysqli_fetch_array($get_car)){

                                         
                                                
                                         
                                ?>
                                    <tr>

                                        <td><?php echo $user['lastname'] ?></td>
                                        <td><?php echo $user['firstname'] ?></td>
                                        <td><?php echo $car['model_name'] ?></td>
                                     
                                        <td><?php echo $pend['total_amount'] ?></td>
                                        <td><?php echo $pend['reason']; ?></td>
                                        <td><?php echo $pend['status'] ?></td>
                                    


                                    </tr>
                                <?php
                                       }
                                    }
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