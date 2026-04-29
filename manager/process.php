<?php 
include '../conn.php';


if(isset($_GET['del_acc'])){
    $user_id = $_GET['user_id'];

    $delete_account = mysqli_query($conn,"DELETE FROM users WHERE user_id = '$user_id' ");
    if($delete_account == true){
        ?>
            <script>
                alert("Account Deleted!");
                location.href='accounts.php';
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Account not Deleted!");
            location.href='accounts.php';
        </script>
    <?php
    }
    
}


//for adding cars 
if(isset($_POST['add_car'])){
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    
    $car_name = $_POST['car_name'];
   
    $car_color = $_POST['car_color'];
  

    $car_plate = $_POST['plate'];
    $no_seats = $_POST['no_seats'];
    $brand_id = $_POST['brand_id'];

    $car_price = $_POST['price_day'];
    $check_car = mysqli_query($conn, "SELECT * FROM car_model WHERE model_name = '$car_name'");
    $car_num = mysqli_num_rows($check_car);
    if($car_num >=1){
        ?>
            <script>
                alert("Car name exist");
                location.href='cars.php';
            </script>
        <?php
    }else{
        $register_car = mysqli_query($conn,"INSERT INTO car_model VALUE('0','$car_name','$car_color','$no_seats','$brand_id','$fileName','$car_plate','Available','$car_price')");
         if($register_car == true){
            move_uploaded_file($fileTmpName, 'assets/uploads/'. $fileName);
            ?>
            <script>
                alert("Car added");
                location.href='cars.php';
            </script>
        <?php
        
         }else{
            ?>
            <script>
                alert("Car not added");
                location.href='cars.php';
            </script>
        <?php
         }
    }
}
//edit cars 
if(isset($_POST['edit_car'])){
    $model_id = $_GET['model_id'];
    $car_name = $_POST['car_name'];
    $car_color = $_POST['car_color'];
    $no_seats = $_POST['no_seats'];
    $status  = $_POST['status'];
    $plate_no = $_POST['plate_no'];
    $price_day = $_POST['price_day'];

    $update_cars = mysqli_query($conn,"UPDATE car_model SET model_name = '$car_name', color='$car_color',no_seats = '$no_seats', plate_no='$no_seats', status = '$status', price_day = '$price_day' WHERE model_id='$model_id'");
    if($update_cars){
        ?>
            <script>
                alert('Car information Updated!');
                location.href='cars.php';
            </script>
        <?php
    }else{
        ?>
            <script>
                alert('Error Updating Car Information');
                location.href='cars.php';
            </script>
        <?php
    }

}

//deleting cars 
if(isset($_GET['del_car'])){
    $car_id = $_GET['model_id'];

    $delete_car = mysqli_query($conn,"DELETE FROM car_model WHERE model_id = '$car_id'");
    if($delete_car == true){
        ?>
            <script>
                alert("Car Deleted Successfully!");
                location.href='cars.php';
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Car not Deleted Successfully!");
            location.href='car.php';
        </script>
    <?php
    }
}

//approve reservation 
if(isset($_GET['approve'])){
    $rental_id = $_GET['rental_id'];
    $car_id = $_GET['model_id'];
    $approve = mysqli_query($conn,"UPDATE tbl_rentals SET status = 'Approved' WHERE rental_id = '$rental_id'");
    if($approve == true){
        mysqli_query($conn,"UPDATE car_model SET status = 'Reserved' WHERE model_id = '$car_id'");
        ?>
            <script>

                alert("Reservation Approved");
                location.href='pending.php';
            </script>
        <?php
    }else{
        ?>
        <script>

            alert("Reservation not Approved");
            location.href='pending.php';
        </script>
    <?php
    }
    
}

//cancel reservation 
if(isset($_POST['cancel'])){
    $rental_id = $_GET['rental_id'];
    $reason = $_POST['reason'];
    $cancel = mysqli_query($conn, "UPDATE tbl_rentals SET status = 'cancel', reason = '$reason' WHERE rental_id = '$rental_id'"); 
    if($cancel == true){
        ?>
        <script>

            alert("Reservation Cancelled");
            location.href='pending.php';
        </script>
    <?php
    }else{
        ?>
        <script>

            alert("Error Cancel");
            location.href='pending.php';
        </script>
    <?php
    }
}

if(isset($_POST['payment'])){
    $rental_id = $_POST['rental_id'];
    $amount = $_POST['amount'];

    $payment = mysqli_query($conn, "UPDATE tbl_rentals SET amount_receive = '$amount' WHERE rental_id = '$rental_id'");
    if($payment ==true){
        ?>
        <script>

            alert("Payment Received!");
            location.href='approved.php';
        </script>
    <?php
    }else{
        ?>
        <script>

            alert("Payment Declined! ");
            location.href='approved.php';
        </script>
    <?php
    }
}


//function for car brand adding
if(isset($_POST['create_brand'])) {
    $car_brand=$_POST['brand_name'];

    $check_car=mysqli_query($conn, "SELECT * from car_brand WHERE brand_name='$car_brand'");

    if ($check_car->num_rows){
        ?>
        <script>
            alert("This brand name already exist!");
            location.href='car_brand.php';

        </script>
        <?php
    }else{
        $create_car=mysqli_query($conn, "INSERT INTO car_brand VALUES ('0','$car_brand','5')");
        if($create_car){
            ?>
        <script>
            alert("Car brand created!");
            location.href='car_brand.php';

        </script>
        <?php
        }else{
            ?>
        <script>
            alert("Error adding car brand!");
            location.href='car_brand.php';

        </script>
        <?php
        }
    }
}

//for deleting car brand
if(isset($_GET['del_car'])){
    $brand_id=$_GET['brand_id'];

    $delete_brand_car=mysqli_query($conn, "DELETE FROM car_brand WHERE brand_id='$brand_id'");
    if($delete_brand_car){
        ?>
        <script>
            alert("Car brand deleted successfuly!");
            location.href='car_brand.php';

        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Error deleting car brand!");
            location.href='car_brand.php';

        </script>
        <?php
    }
}

//function for editing car brand
if(isset($_POST['edit_brand'])){
    $update_brand_id=$_GET['brand_id'];

    $update_brand_name=$_POST['brand_name'];

    //update brand name query
    $update_brand_name=mysqli_query($conn, "UPDATE car_brand SET brand_name='$update_brand_name' WHERE brand_id='$update_brand_id'");
    if($update_brand_name){
        ?>
        <script>
            alert("Car brand Updated!");
            location.href='car_brand.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Error updating brand name!");
            location.href='car_brand.php';
        </script>
        <?php 
    }
}
?>