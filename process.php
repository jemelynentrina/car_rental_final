<?php
include "conn.php";

if(isset($_POST['Registration'])){

    $ln=mysqli_real_escape_string($conn, $_POST['ln']);
    $fn=mysqli_real_escape_string($conn, $_POST['fn']);
    $pn=mysqli_real_escape_string($conn, $_POST['pn']);
    $address=mysqli_real_escape_string($conn, $_POST['address']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    


            
    $check=mysqli_query($conn, "SELECT * FROM tbl_users WHERE  email='$email'");
    $num_check=mysqli_num_rows($check);

    if($num_check >=1){
        ?>
        <script>alert("This email is already Used!");
            location.href="index.php";
        </script>
        <?php
    }else{
        $register=mysqli_query($conn, "INSERT INTO tbl_users VALUES ('0', '$ln', '$fn', '$pn', '$email', '$password','1')");
        if($register==true){
            ?>
            <script>
                alert("Account created successfuly!");
                location.href="index.php";
            </script>



            <?php
        }
    }
   
    }
    


//login user

if(isset($_POST['login'])){
    $login_email = mysqli_real_escape_string($conn,$_POST['email']);
    $login_pass = mysqli_real_escape_string($conn,$_POST['password']);

    $login = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email = '$login_email' AND password = '$login_pass'");
    $login_num_rows = mysqli_num_rows($login);


    if($login_num_rows >=1 ){
        $_SESSION['email'] = $login_email;
            ?>
                <script>
                    alert("Login Success");
                    location.href='customer/index.php';
                </script>
            <?php
    }else{
        $login_admin = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$login_email' AND password = '$login_pass'");
        $admin_num = mysqli_num_rows($login_admin);
        if($admin_num >= 1){
            $_SESSION['email'] = $login_email;
            ?>
                <script>
                    alert("Welcome Login");
                    location.href='Admin/index.php';
                </script>
            <?php
        }else{
            
            $check_manager = mysqli_query($conn,"SELECT * FROM tbl_manager WHERE email = '$login_email' AND password = '$login_pass'");
            if($check_manager->num_rows >=1){
                $_SESSION['email'] = $login_email;
                
                
                ?>
                    <script>
                        alert("Welcome Manager");
                        location.href='manager/index.php';
                    </script>
                <?php
                
            }else{
                ?>
                <script>
                    alert("No Account Found");
                    location.href='index.php';
                </script>
            <?php
            }
        
        }
    }
}






?>