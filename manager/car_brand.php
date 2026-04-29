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
                <li class="breadcrumb-item active">Car Brand</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create_brand"> create car brand </button>
        <div class="row">
            <div class="modal fade" id="create_brand" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Brand Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="process.php" method="POST">
                                <div class="input-group">
                                    <div class="input-group-text"></div>
                                    <input type="text" name="brand_name" placeholder="Enter Brand Name" id="" class="form-control">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create_brand" class="btn btn-primary">Add Brand</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow py-2">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">brand_id</th>
                            <th scope="col">brand_name</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_car = mysqli_query($conn, "SELECT * FROM car_brand");

                        while ($car = mysqli_fetch_array($get_car)) {



                        ?>
                            <tr>

                                <th><?php echo $car['brand_id'] ?></th>
                                <td><?php echo $car['brand_name'] ?></td>
                                <td>
                                  
                                    <div class="d-flex gap-2">
                                    <div class="modal fade" id="edit_car<?php echo $car['brand_id']; ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Brand Name</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="process.php?brand_id=<?php echo $car['brand_id']; ?>" method="POST">
                                                        <div class="input-group">
                                                            <div class="input-group-text"></div>
                                                            <input type="text" name="brand_name" value="<?php echo $car['brand_name'] ?>" placeholder="Enter Brand Name" id="" class="form-control">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="edit_brand" class="btn btn-primary">Update Brand</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_car<?php echo $car['brand_id']; ?>"> edit</button>
                                        <a href="process.php?brand_id=<?php echo $car['brand_id'] ?>&&del_car" class="btn btn-danger" onclick="return confirm('Do you want to delete car brand?')">delete</a>

                                    </div>
                                </td>



                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>

            </div>


        </div>
    </section>

</main><!-- End #main -->
<?php
include 'inc/footer.php';
?>