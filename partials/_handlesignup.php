<?php
// $showAlert = false;
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';
        $user_email = $_POST['signupEmail'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        //   checking for email - exists or not
            $existSql = "select * from `users` where user_email = '$user_email' ";
            $result = mysqli_query($conn, $existSql);


        
        $numRows = mysqli_num_rows($result);
        if($numRows>0){
            $showError = "Email already in use";
        }
        else{
            if($pass == $cpass){
               $hash = password_hash($pass, PASSWORD_DEFAULT);
               $sql = "INSERT INTO `users` ( `user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp()) ";
               $result = mysqli_query($conn, $sql);
               if($result){
                   
                   $showAlert = true;
                   header("Location: /techies/index.php?signupsuccess=true");
                   exit();
               }
            }
            else{
                $showError = "passwords do not match. please use the same password";
                //  header("Location: /techies/index.php?signupsuccess=false&error=$showError");
            }
        }
        header("Location: /techies/index.php?signupsuccess=false&error=$showError");

      }

?>