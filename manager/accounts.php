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
            <div class="card shadow">
                <div class="card-body">
                    <table class="table datatable" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $get_account = mysqli_query($conn,"SELECT * FROM users");
                                while($account = mysqli_fetch_array($get_account)){

                             
                            ?>
                            <tr>
                                <th><?php echo $account['user_id']; ?></th>
                                <th><?php echo $account['lastname']; ?></th>
                                <th><?php echo $account['firstname']; ?></th>
                                <th><?php echo $account['phone']; ?></th>
                                <th><?php echo $account['address']; ?></th>
                                <th><?php echo $account['email']; ?></th>
                                <th>
                                    <div class="d-flex gap-2">
                                        <button type="submit" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-success"><i class="bi bi-pen"></i></button>
                                        <a href='process.php?user_id=<?php echo $account['user_id']; ?>&&del_acc' onclick="return confirm('do you want to delete this account?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </div>
                                </th>
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