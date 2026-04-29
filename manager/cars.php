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
                            <label class="fw-bold">Model Image</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-file"></i></div>
                                <input type="file" name="file" class="form-control" accept="image/*">
                            </div>
                            <label class="fw-bold">Model Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <input type="text" name="car_name" class="form-control" placeholder="Enter Model Name" required>
                            </div>
                            <label class="fw-bold">Car Color</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <input type="color" name="car_color" class="form-control" placeholder="Enter Car Model" required>
                            </div>

                            <label class="fw-bold">No. Seats</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <input type="number" name="no_seats" class="form-control" placeholder="Enter Car Price Per Day" required>
                            </div>

                            <label class="fw-bold">Brand</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text"><i class="bi bi-text"></i></div>
                                <select name="brand_id" class="form-control">
                                    <option value="">--Select Car Brand</option>
                                    <?php
                                    $getbrand = mysqli_query($conn, "SELECT * FROM car_brand");
                                    while ($brand = mysqli_fetch_array($getbrand)) {
                                    ?>
                                        <option value="<?php echo $brand['brand_id'] ?>"><?php echo $brand['brand_name'] ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                            </div>

                            <label class="fw-bold">Plate No.</label>
                            <div class="input-group">
                                <div class="input-group-text"></div>
                                <input type="text" name="plate" class="form-control" placeholder="Plate NUmber" required>
                            </div>
                            <label for="">Price Per Day</label>
                            <div class="input-group">
                                <div class="input-group-text"></div>
                                <input type="text" name="price_day" class="form-control" placeholder="Price Per Day" required>
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
            $get_car = mysqli_query($conn, "SELECT * FROM car_model");
            while ($car = mysqli_fetch_array($get_car)) {


            ?>
                <div class="col-4">
                    <div class="card shadow border border-primary h-100">
                        <img src="assets/uploads/<?php echo $car['car_img'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h3 class="mt-3 fw-bold"><?php echo $car['model_name'] ?></h3>
                            <div class="d-flex justify-content-between">
                                <p>Price perday / <?php echo $car['price_day']; ?> </p>
                                <p style="background-color:<?php echo $car['color'] ?>;width:25px; height:25px;" class="rounded-circle"></p>
                            </div>

                            <p>Plate number / <?php echo $car['plate_no']; ?></p>


                            <div class="d-flex gap-2  mt-3 justify-content-end">
                                <button type="submit" data-bs-toggle="modal" data-bs-target="#edit_car<?php echo $car['model_id']; ?>" class="btn btn-success">Edit</button>
                                <a href="process.php?model_id=<?php echo     $car['model_id'] ?>&&del_car" class="btn btn-danger">Delete</a>
                            </div>
                        </div>

                    </div>

                    <div class="modal fade" id="edit_car<?php echo $car['model_id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Car Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="process.php?model_id=<?php echo $car['model_id'] ?>" method="POST">


                                        <label for="">Model Name</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="text" name="car_name" value="<?php echo $car['model_name'] ?>" class="form-control" placeholder="Enter Car Name" required>
                                        </div>
                                        <label for="">Car Color</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="color" name="car_color" value="<?php echo $car['color'] ?>" class="form-control" placeholder="Enter Car Color" required>
                                        </div>

                                        <label for="">No. Seats</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="number" name="no_seats" value="<?php echo $car['no_seats'] ?>" class="form-control" placeholder="Enter No. Seats" required>
                                        </div>

                                        <label for="">Status</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="text" name="status" value="<?php echo $car['status']; ?>" class="form-control">
                                        </div>

                                           <label for="">Plate Number</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"></i></div>
                                            <input type="text" name="plate_no" value="<?php echo $car['plate_no']; ?>" class="form-control">
                                        </div>

                                        
                                           <label for="">Price Per Day</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text"><i class="bi bi-text"> </i></div>
                                            <input type="text" name="price_day" value="<?php echo $car['price_day']; ?>" class="form-control">
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