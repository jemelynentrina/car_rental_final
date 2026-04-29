<?php
include '../conn.php';


//create manager account
if (isset($_POST['add_manage'])) {
    $manage_last = $_POST['manage_last'];
    $manage_first = $_POST['manage_first'];
    $manage_add = $_POST['manage_address'];
    $manage_email = $_POST['manage_email'];
    $manage_pass = $_POST['manage_pass'];
    $admin_id  = $_POST['admin_id'];
    $check_manage = mysqli_query($conn, "SELECT * FROM tbl_manager WHERE email = '$manage_email'");


    if ($check_manage->num_rows >= 1) {
?>
        <script>
            alert('This Account already exist');
            location.href = 'accounts.php';
        </script>
        <?php
    } else {
        $manage_reg = mysqli_query($conn, "INSERT INTO tbl_manager VALUE('0','$manage_last','$manage_first','$manage_add','$manage_email','$manage_pass','$admin_id')");
        if ($manage_reg) {
        ?>
            <script>
                alert('Manager Account Added');
                location.href = 'accounts.php';
            </script>
        <?php
        }
    }
}

//update account
if (isset($_POST['upd_manage'])) {
    $manage_id = $_GET['manager_id'];
    $upd_manage_last = $_POST['manage_last'];
    $upd_manage_first = $_POST['manage_first'];
    $upd_manage_add = $_POST['manage_email'];
    $upd_manage_email = $_POST['manage_email'];


    $update_manage = mysqli_query($conn, "UPDATE tbl_manager SET lastname = '$upd_manage_last', firstname = '$upd_manage_first', address = '$upd_manage_add', email = '$upd_manage_email' WHERE manager_id = '$manage_id'");
    if ($update_manage) {
        ?>
        <script>
            alert('Manager Account Updated!');
            location.href = 'accounts.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Updating Manager Account');
            location.href = 'accounts.php';
        </script>
    <?php
    }
}



//del user_account 

if (isset($_GET['del_acc'])) {
    $user_id = $_GET['user_id'];

    $delete_account = mysqli_query($conn, "DELETE FROM users WHERE user_id = '$user_id' ");
    if ($delete_account == true) {
    ?>
        <script>
            alert("Account Deleted!");
            location.href = 'accounts.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Account not Deleted!");
            location.href = 'accounts.php';
        </script>
    <?php
    }
}


//for adding cars 
if (isset($_POST['add_car'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];

    $car_name = $_POST['car_name'];
    $car_model = $_POST['car_model'];
    $car_price = $_POST['car_price'];
    $status = $_POST['status'];
    $car_plate = $_POST['plate'];

    $check_car = mysqli_query($conn, "SELECT * FROM cars WHERE car_name = '$car_name'");
    $car_num = mysqli_num_rows($check_car);
    if ($car_num >= 1) {
    ?>
        <script>
            alert("Car name exist");
            location.href = 'cars.php';
        </script>
        <?php
    } else {
        $register_car = mysqli_query($conn, "INSERT INTO cars VALUE('0','$fileName','$car_name','$car_model','$car_price','$status','$car_plate')");
        if ($register_car == true) {
            move_uploaded_file($fileTmpName, 'assets/uploads/' . $fileName);
        ?>
            <script>
                alert("Car added");
                location.href = 'cars.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Car not added");
                location.href = 'cars.php';
            </script>
        <?php
        }
    }
}

//deleting cars 
if (isset($_GET['del_car'])) {
    $car_id = $_GET['car_id'];

    $delete_car = mysqli_query($conn, "DELETE FROM cars WHERE car_id = '$car_id'");
    if ($delete_car == true) {
        ?>
        <script>
            alert("Car Deleted Successfully!");
            location.href = 'cars.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Car not Deleted Successfully!");
            location.href = 'cars.php';
        </script>
    <?php
    }
}
//updating car details 
if (isset($_POST['edit_car'])) {
    $car_name = $_POST['car_name'];
    $car_model = $_POST['car_model'];
    $car_price = $_POST['car_price'];
    $car_status = $_POST['status'];
    $car_id = $_GET['car_id'];

    $upd_car =  mysqli_query($conn, "UPDATE cars SET car_name = '$car_name', car_model = '$car_model' ,price_day = '$car_price', car_status = '$car_status' WHERE car_id = '$car_id'");
    if ($upd_car == true) {
    ?>
        <script>
            alert("Car Details Updated");
            location.href = 'cars.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Car Details not Updated");
            location.href = 'cars.php';
        </script>
    <?php
    }
}
//approve reservation 
if (isset($_GET['approve'])) {
    $rental_id = $_GET['rental_id'];
    $car_id = $_GET['car_id'];
    $approve = mysqli_query($conn, "UPDATE tbl_rentals SET status = 'Approved' WHERE rental_id = '$rental_id'");
    if ($approve == true) {
        mysqli_query($conn, "UPDATE cars SET car_status = 'Reserved' WHERE car_id = '$car_id'");
    ?>
        <script>
            alert("Reservation Approved");
            location.href = 'pending.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Reservation not Approved");
            location.href = 'pending.php';
        </script>
    <?php
    }
}

//cancel reservation 
if (isset($_POST['cancel'])) {
    $rental_id = $_GET['rental_id'];
    $reason = $_POST['reason'];
    $cancel = mysqli_query($conn, "UPDATE tbl_rentals SET status = 'cancel', reason = '$reason' WHERE rental_id = '$rental_id'");
    if ($cancel == true) {
    ?>
        <script>
            alert("Reservation Cancelled");
            location.href = 'pending.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error Cancel");
            location.href = 'pending.php';
        </script>
    <?php
    }
}

// update managers account


if (isset($_POST['upd_manage'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $manage_id = $_GET['id'];
    $update_manager = mysqli_query($conn, "UPDATE manager SET last_name='$lastname', first_name='$firstname', phone='$phone', email='$email'  WHERE id=$manage_id");
    if ($update_manager == true) {
    ?>

        <script>
            alert("Managers account updated successfuly!");
            location.href = 'accounts.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error Updating Manager Account!");
            location.href = 'accounts.php';
        </script>
    <?php
    }
}
//end of the update managers account

if (isset($_GET['del_manage'])) {
    $id_manage = $_GET['manage_id'];

    $delete_manage = mysqli_query($conn, "DELETE FROM tbl_manager WHERE manager_id='$id_manage'");

    if ($delete_manage == true) {
    ?>
        <script>
            alert("Manager's Account Deleted!");
            location.href = 'accounts.php';
        </script>

    <?php

    } else {
    ?>
        <script>
            alert("Error Deleting Manager's Account!");
            location.href = 'accounts.php';
        </script>


<?php
    }
}

//add client account 
if (isset($_POST['add_client'])) {
    $client_first = $_POST['client_first'];
    $client_last = $_POST['client_last'];
    $client_phone = $_POST['client_phone'];
    $client_email = $_POST['client_email'];
    $client_pass = $_POST['client_pass'];
    $admin_id  = $_POST['admin_id'];

    $check = mysqli_query($conn,"SELECT * FROM tbl_users WHERE email = '$client_email'");
    if($check ->num_rows >=1 ){
        ?>
            <script>
                alert("This email already exist");
                location.href='accounts.php';
            </script>
        <?php
    }else{
        $create_client = mysqli_query($conn,"INSERT INTO tbl_users VALUES ('0','$client_last','$client_first','$client_phone','$client_email','$client_pass','$admin_id')");
        if($create_client){
            ?>
                <script>
                    alert("Account Created Successfully!");
                    location.href="accounts.php";
                </script>
            <?php
        }
    }
}

//for deleting client accounts 
if(isset($_GET['del_client'])){
    $user_id = $_GET['user_id'];

    $delete_client = mysqli_query($conn,"DELETE FROM tbl_users WHERE user_id = '$user_id'");
    if($delete_client){
        ?>
            <script>
                alert("Account Deleted!");
                location.href='accounts.php';
            </script>
        <?php
    }else{
        ?>      
        <script>
            alert("Account not deleted!");
        location.href ='accounts.php';
        </script>
        <?php
    }

}//

if(isset($_POST['upd_client'])){
    $user_id = $_GET['user_id'];
    $client_last = $_POST['client_last'];
    $client_first = $_POST['client_first'];
    $client_phone = $_POST['client_phone'];
    $manage_email = $_POST['manage_email'];

    $update_client = mysqli_query($conn,"UPDATE  tbl_users SET lastname = '$client_last', firstname = '$client_first', 
    phone = '$client_phone', email = '$manage_email' WHERE user_id = '$user_id'");
     if($update_client){
        ?>
            <script>
                alert("Account Updated!");
                location.href='accounts.php';
            </script>
        <?php
    }else{
        ?>      
        <script>
            alert("Account not Update!");
        location.href ='accounts.php';
        </script>
        <?php
    }

    
}

//
?>