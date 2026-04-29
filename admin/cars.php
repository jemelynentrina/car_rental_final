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
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_cars">Add Cars</button>
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



        <div class="row">
            <?php
            $get_car = mysqli_query($conn, "SELECT * FROM cars");
            while ($car = mysqli_fetch_array($get_car)) {


            ?>
                <div class="col-4">
                    <div class="card">
                        <img src="assets/uploads/<?php echo $car['car_img'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h3 class="mt-3 fw-bold"><?php echo $car['car_name'] ?></h3>
                            <p><?php echo $car['car_model']?></p>
                            <p>price / <?php echo $car['price_day']?></p>
                            <p>plate number/ <?php echo $car['car_plate'];?></p>


                            <div class="d-flex gap-2  mt-3 justify-content-end">
                                <button type="submit" data-bs-toggle="modal" data-bs-target="#edit_car<?php echo $car['car_id']; ?>" class="btn btn-primary">Edit</button>
                                <a href="process.php?car_id=<?php echo $car['car_id'] ?>&&del_car" class="btn btn-danger">Delete</a>
                            </div>
                        </div>

                    </div>

                    <div class="modal fade" id="edit_car<?php echo $car['car_id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Car Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="process.php?car_id=<?php echo $car['car_id'] ?>" method="POST">



                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="text" name="car_name" value="<?php echo $car['car_name'] ?>" class="form-control" placeholder="Enter Car Name" required>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="text" name="car_model" value="<?php echo $car['car_model'] ?>" class="form-control" placeholder="Enter Car Model" required>
                                        </div>


                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="number" name="car_price" value="<?php echo $car['price_day'] ?>"s class="form-control" placeholder="Enter Car Price Per Day" required>
                                        </div>


                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <select name="status" class="form-control">
                                                <option value="<?php echo $car['car_status'] ?>"><?php echo $car['car_status'] ?></option>
                                                <option value="Available">Available</option>
                                                <option value="Unavailable">Unavailable</option>
                                            </select>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="edit_car" class="btn btn-primary">Save Changes</button>
                                  
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