<?php

include '../conn.php';

if (isset($_POST['book'])) {

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    
    $pick_date = mysqli_real_escape_string($conn, $_POST['rent_date']);

    $car_id = mysqli_real_escape_string($conn, $_POST['car_id']);

    $return_date = mysqli_real_escape_string($conn, $_POST['return_date']);
    $status = "Pending";
    $car_price = $_POST['car_price'];
   


     $date1 = new DateTime($pick_date);
            $date2 = new DateTime($return_date);

   $rent_days = $date1->diff($date2);

    $num_val = $rent_days->format('%d');

     $total_price = $car_price * $num_val;
  
 
    $final_total = $total_price * 10;

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];

    $payment_mode = $_POST['payment_option'];
    $type_delivery = $_POST['type_delivery'];
    $driver_option = $_POST['driver_option'];
    //$ref_no = $_POST['reference'];
    $get_user = mysqli_query($conn, "SELECT * FROM tbl_users WHERE user_id = '$user_id'");
    while ($user = mysqli_fetch_object($get_user)) {
        $fullname = $user->firstname . '' . $user->lastname;
    }

    $check_booking = mysqli_query($conn, "SELECT * FROM tbl_rentals WHERE pickup_date = '$pick_date' AND status  = 'Approved' AND card_id  = '$car_id'");
    if ($check_booking->num_rows >= 1) {
?>
        <script>
            alert("This is already reserved!");
            location.href = 'cars.php';
        </script>
        <?php
    } else {

        if ($payment_mode == 'Gcash') {

            // // Your PayMongo Secret API Key (Test mode key for testing)
            $api_key = "sk_test_oCfq9LAdSGK1uZtK9PcsBBQJ";

            // API endpoint
            $url = "https://api.paymongo.com/v1/checkout_sessions";

            // Payload data
            $data = [
                "data" => [
                    "attributes" => [
                        " send_email_receipt" => true,
                        "show_description" => true,
                        "show_line_items" => true,
                        "description" => "Booking Information",
                        "payment_method_types" => `<?php echo $payment_mode ?>`,
                        "line_items" => [
                            [
                                "name" => `<?php echo $fullname ?>`,
                                "days" => `<?php echo $num_val ?>`,
                                // Amount is in centavos (e.g. 10000 = ₱100.00)
                                "amount" => `<?php echo  $final_total ?>`,
                                "currency" => "PHP",


                            ]
                        ],
                        "success_url" => "http://localhost/car_rental/customer/cars.php",
                        "cancel_url" => "http://localhost/car_rental/customer/cars.php"
                    ]
                ]
            ];

            // Initialize cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Basic ' . base64_encode($api_key . ':')
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            // Execute request
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            // Decode the response
            $result = json_decode($response, true);

            //Print the full response for debugging
            print_r($result);

            // Redirect customer to PayMongo checkout
            if (isset($result['data']['attributes']['checkout_url'])) {
                header("Location: " . $result['data']['attributes']['checkout_url']);
                exit();
            } else {
            }
        } else if ($payment_mode == "Cash") {
            $book = mysqli_query($conn, "INSERT INTO tbl_rentals VALUES ('0','$user_id','$num_val','$pick_date','$total_price','$car_id','$return_date','$status','$fileName','','$payment_mode','','','$type_delivery','$driver_option')");
            if ($book == true) {
                move_uploaded_file($fileTmpName, 'assets/uploads/' . $fileName);
        ?>
                <script>
                    alert("Reservation pending, please wait for confirmation");
                    window.location.href = "cars.php";
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Error on reservation");
                    window.location.href = "cars.php";
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("haaakdog!");
                location.href = 'cars.php';
            </script>
        <?php
        }
    }
}

//cancel funtion
if (isset($_GET['cancel'])) {
    $rental_id = $_GET['rental_id'];


    $cancel = mysqli_query($conn, "UPDATE tbl_rentals SET status= 'canceled' WHERE rental_id='$rental_id'");

    if ($cancel == true) {
        ?>
        <script>
            alert("Reservation Canceled");
            location.href = 'pending.php'
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
//






?>