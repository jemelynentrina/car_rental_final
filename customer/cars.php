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
                <li class="breadcrumb-item active">Cars</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="d-flex justify-content-end">

        </div>

        <div class="modal fade" id="add_cars" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Car Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="process.php" method="POST" enctype="multipart/form-data">

                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-file"></i></div>
                                <input type="file" name="file" class="form-control" accept="image/*">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <input type="text" name="car_name" class="form-control" placeholder="Enter Car Name" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <input type="text" name="car_model" class="form-control" placeholder="Enter Car Model" required>
                            </div>


                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <input type="number" name="car_price" class="form-control" placeholder="Enter Car Price Per Day" required>
                            </div>


                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <select name="status" class="form-control">
                                    <option value="">--select car status</option>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>

                                </select>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_car" class="btn btn-primary">Add Car</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-text"><i class="bi bi-search"></i></div>
            <input type="Search" name="" placeholder="Search" class="form-control">
        </div>


        <div class="row">
            <?php
            $get_car = mysqli_query($conn, "SELECT * FROM car_model");
            while ($car = mysqli_fetch_array($get_car)) {
                $car_id = $car['model_id'];




            ?>
                <div class="col-4 mb-3">
                    <?php
                    if ($car['status'] != "Available") {
                    ?>
                        <div class="card shadow border border-primary h-100 ">
                            <img src="../manager/assets/uploads/<?php echo $car['car_img'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h3 class="mt-3 fw-bold text-centerd"><?php echo $car['model_name'] ?></h3>
                                <!-- <h5><?php echo $car['car_model'] ?></h5> -->
                                <p class=""> &#8369; <?php echo $car['price_day']; ?> / day</p>
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-danger"><?= $car['status'] ?></span>
                                    <i class="bi bi-person-fill">&nbsp;<?php echo $car['no_seats'] ?> Seats</i>
                                </div>
                                <div class="d-flex gap-2  mt-3 justify-content-end">
                                    <button type="submit" disabled data-bs-toggle="modal" data-bs-target="#Book<?php echo $car['model_id'] ?>" class="btn btn-primary">Book</button>
                                </div>
                            </div>

                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card shadow border border-primary h-100">
                            <img src="../manager/assets/uploads/<?php echo $car['car_img'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h3 class="mt-3 fw-bold text-centerd"><?php echo $car['model_name'] ?></h3>
                                <!-- <h5><?php echo $car['car_model'] ?></h5> -->
                                <p class=""> &#8369; <?php echo $car['price_day']; ?> / day</p>
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-primary"><?= $car['status'] ?></span>
                                    <i class="bi bi-person-fill">&nbsp;<?php echo $car['no_seats'] ?> Seats</i>
                                </div>
                                <div class="d-flex gap-2  mt-3 justify-content-end">
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#Book<?php echo $car['model_id'] ?>" class="btn btn-primary">Book</button>
                                </div>
                            </div>

                        </div>
                    <?php
                    }
                    ?>

                    <div class="modal fade" id="Book<?php echo $car['model_id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Booking Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="process.php" method="POST" enctype="multipart/form-data">


                                        <div class="row">
                                            <div class="col-12">
                                                <script>
                                                    // Get the current date
                                                    const today = new Date();

                                                    // Format the date to YYYY-MM-DD for the min attribute
                                                    const year = today.getFullYear();
                                                    const month = (today.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-indexed
                                                    const day = today.getDate().toString().padStart(2, '0');

                                                    const minDate = `${year}-${month}-${day}`;

                                                    // Set the min attribute of the input
                                                    document.getElementById('myDate').min = minDate;
                                                </script>


                                                <label class="fw-bold">Rent Date</label>
                                                <div class="input-group mb-3">

                                                    <div class="input-group-text"><i class="bi bi-text"></i></div>
                                                    <input type="date" id="myDate" name="rent_date" class="form-control" placeholder="Enter Car Model" required>
                                                </div>

                                                <label class="fw-bold">Return Date</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text"><i class="bi bi-text"></i></div>
                                                    <input type="date" name="return_date" class="form-control" placeholder="Enter Car Price Per Day" required>
                                                </div>

                                                <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                                <input type="hidden" value="<?php echo $car['model_id'] ?>" name="car_id">
                                                <input type="hidden" value="<?php echo $car['price_day'] ?>" name="car_price">



                                                <label class="fw-bold">Drivers License</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text"><i class="bi bi-text"></i></div>
                                                    <input type="file" accept="image/*" name="file" class="form-control" placeholder="Enter Car Price Per Day" required>
                                                </div>

                                                <label class="fw-bold">Type of Delivery</label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                                                    <select name="type_delivery" class="form-control" required>
                                                        <option value="">--Select Type of Delivery</option>
                                                        <option value="Pick Up">Pic Up</option>
                                                        <option value="Drop Off">Drop Off</option>

                                                    </select>
                                                </div>

                                                <label for="">Driver Option</label>
                                                <select name="driver_option" class="form-control" required>
                                                    <option value="">--Select Option</option>
                                                    <option value="Self Drive">Self Drive</option>
                                                    <option value="With Driver">With Driver</option>
                                                </select>


                                                <label class="fw-bold">Payment Option</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text"><i class="bi bi-text"></i></div>
                                                    <select name="payment_option" id="payment_opt<?php echo $car['model_id'] ?>" class="form-control" required>
                                                        <option value="">--select mode of payment</option>
                                                        <option value="Gcash">Online</option>
                                                        <option value="Cash">Cash</option>
                                                    </select>
                                                </div>


                                            </div>

                                        </div>






                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="book" class="btn btn-primary">Submit</button>
                                </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            }

            ?>
        </div>
    </section>



</main><!-- End #main -->
<?php
include 'inc/footer.php';
?>