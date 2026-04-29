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
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#home">Manager Accounts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Client Accounts</a>
      </li>

    </ul>

    <div class="modal fade" id="add_manage" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Manager Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="process.php" method="POST">

              <div class="row">
                <div class="col-6">
                  <label for="">Lastname</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                    <input type="text" name="manage_last" class="form-control" placeholder="Enter Lastname" required>
                  </div>
                </div>
                <div class="col-6">
                  <label for="">Firstname</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                    <input type="text" name="manage_first" class="form-control" placeholder="Enter Firstname" required>
                  </div>
                </div>

                <div class="col-6">
                  <label for="">Address</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                    <input type="text" name="manage_address" class="form-control" placeholder="Enter Address" required>
                  </div>
                </div>

                <div class="col-6">
                  <label for="">Email</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                    <input type="email" name="manage_email" class="form-control" placeholder="Enter Email" required>
                  </div>
                </div>

                <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">

                <div class="col-12">
                  <label for="">Password</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-key"></i></div>
                    <input type="password" name="manage_pass" id="pass" class="form-control" placeholder="Enter Password" required>
                  </div>
                  <input type="checkbox" onclick="showpass()">Showpassword
                </div>

                <script>
                  function showpass() {
                    var x = document.getElementById('pass');
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add_manage" class="btn btn-primary">Add Manager Account</button>
          </div>
          </form>
        </div>
      </div>
    </div>

       <div class="modal fade" id="add_client" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Manager Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="process.php" method="POST">

              <div class="row">
                <div class="col-6">
                  <label for="">Lastname</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                    <input type="text" name="client_last" class="form-control" placeholder="Enter Lastname" required>
                  </div>
                </div>
                <div class="col-6">
                  <label for="">Firstname</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                    <input type="text" name="client_first" class="form-control" placeholder="Enter Firstname" required>
                  </div>
                </div>

                <div class="col-6">
                  <label for="">Phone</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-phone"></i></div>
                    <input type="text" name="client_phone" class="form-control" placeholder="Enter Address" required>
                  </div>
                </div>

                <div class="col-6">
                  <label for="">Email</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                    <input type="email" name="client_email" class="form-control" placeholder="Enter Email" required>
                  </div>
                </div>

                <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">

                <div class="col-12">
                  <label for="">Password</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-key"></i></div>
                    <input type="password" name="client_pass" id="pass" class="form-control" placeholder="Enter Password" required>
                  </div>
                  <input type="checkbox" onclick="showpass()">Showpassword
                </div>

                  <input type="hidden" name="admin_id" value="<?= $admin_id; ?>">
                <script>
                  function showpass() {
                    var x = document.getElementById('pass');
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add_client" class="btn btn-primary">Create Client</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <div class="d-flex justify-content-between">
          <h3>MANAGER Account</h3>
          <button data-bs-toggle="modal" data-bs-target="#add_manage" class="btn btn-primary"> <i class="bi bi-plus-circle"></i> Manager account</button>
        </div>
        <div class="card shadow">
          <div class="card-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Address</th>

                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $get_account = mysqli_query($conn, "SELECT * FROM tbl_manager");
                while ($account = mysqli_fetch_array($get_account)) {

                ?>
                  <tr>
                    <th><?php echo $account['manager_id']; ?></th>
                    <th><?php echo $account['lastname']; ?></th>
                    <th><?php echo $account['firstname']; ?></th>
                    <th><?php echo $account['address']; ?></th>

                    <th><?php echo $account['email']; ?></th>
                    <th>
                      <div class="d-flex gap-2">
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#id_manager<?php echo $account['manager_id'] ?>" class="btn btn-success"><i class="bi bi-pen"></i></button>
                        <a href="process.php?manage_id=<?php echo $account['manager_id']; ?>&&del_manage" onclick="return confirm('do you want to delete this account?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                      </div>
                    </th>
                  </tr>
                  <div class="modal" id="id_manager<?php echo $account['manager_id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Account Information</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="process.php?manager_id=<?php echo $account['manager_id'] ?>" method="POST">

                            <div class="row">
                              <div class="col-6">
                                <label for="">Lastname</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="text"  name="manage_last" value="<?php echo $account['lastname']; ?>" class="form-control" placeholder="Enter Lastname" required>
                                </div>
                              </div>
                              <div class="col-6">
                                <label for="">Firstname</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="text" name="manage_first" value="<?php echo $account['firstname'] ?>" class="form-control" placeholder="Enter Firstname" required>
                                </div>
                              </div>

                              <div class="col-6">
                                <label for="">Address</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="text" name="manage_address" value="<?php echo $account['address'] ?>" class="form-control" placeholder="Enter Address" required>
                                </div>
                              </div>

                              <div class="col-6">
                                <label for="">Email</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="email" name="manage_email" value="<?php echo $account['email']; ?>" class="form-control" placeholder="Enter Email" required>
                                </div>
                              </div>




                            </div>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="upd_manage" class="btn btn-primary">Save changes</button>

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
          </div>
        </div>
      </div>
    

        <div id="menu1" class="container tab-pane active"><br>
        <div class="d-flex justify-content-between">
          <h3>Client Account</h3>
          <button data-bs-toggle="modal" data-bs-target="#add_client" class="btn btn-primary"> <i class="bi bi-plus-circle"></i> Client account</button>
        </div>
        <div class="card shadow">
          <div class="card-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $get_account = mysqli_query($conn, "SELECT * FROM tbl_users");
                while ($account = mysqli_fetch_array($get_account)) {

                ?>
                  <tr>
                    <th><?php echo $account['user_id']; ?></th>
                    <th><?php echo $account['lastname']; ?></th>
                    <th><?php echo $account['firstname']; ?></th>
                    <th><?php echo $account['phone']; ?></th>

                    <th><?php echo $account['email']; ?></th>
                    <th>
                      <div class="d-flex gap-2">
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#id_manager<?php echo $account['user_id'] ?>" class="btn btn-success"><i class="bi bi-pen"></i></button>
                        <a href="process.php?user_id=<?php echo $account['user_id']; ?>&&del_client" onclick="return confirm('do you want to delete this account?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                      </div>
                    </th>
                  </tr>
                  <div class="modal" id="id_manager<?php echo $account['user_id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Account Information</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="process.php?user_id=<?php echo $account['user_id'] ?>" method="POST">

                            <div class="row">
                              <div class="col-6">
                                <label for="">Lastname</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="text"  name="client_last" value="<?php echo $account['lastname']; ?>" class="form-control" placeholder="Enter Lastname" required>
                                </div>
                              </div>
                              <div class="col-6">
                                <label for="">Firstname</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="text" name="client_first" value="<?php echo $account['firstname'] ?>" class="form-control" placeholder="Enter Firstname" required>
                                </div>
                              </div>

                              <div class="col-6">
                                <label for="">Phone</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="text" name="client_phone" value="<?php echo $account['phone'] ?>" class="form-control" placeholder="Enter Address" required>
                                </div>
                              </div>

                              <div class="col-6">
                                <label for="">Email</label>
                                <div class="input-group">
                                  <div class="input-group-text"></div>
                                  <input type="email" name="manage_email" value="<?php echo $account['email']; ?>" class="form-control" placeholder="Enter Email" required>
                                </div>
                              </div>




                            </div>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="upd_client" class="btn btn-primary">Save changes</button>

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
          </div>
        </div>
      </div>
    

    </div>

    
  </section>

</main><!-- End #main -->
<?php
include 'inc/footer.php';
?>