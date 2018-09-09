<?php
error_reporting(0);
session_start();
$_SESSION['login'] = false;
if($_POST['captcha'] == $_SESSION['sacaptchaCode']) {

    if (isset($_POST['submit'])) {
        require("connect.php");

        $email = $_POST['inputEmail'];

        $password = $_POST['inputPassword'];

        $insert = "SELECT * FROM `user` WHERE email='$email' && password='$password'";

        $result = mysqli_query($sql, $insert);
        if (mysqli_num_rows($result) > 0) {
            $insert2 = "SELECT * FROM `user` WHERE email='$email' && password='$password' && status=0";

            $result2 = mysqli_query($sql, $insert2);
            if (mysqli_num_rows($result2) > 0) {
            $row = mysqli_fetch_array($result);

            if ($row["id"]) {
                $_SESSION["user"] = true;
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_name"] = $row["email"];
                echo "<script>
			        document.location.href='../index.php';
			</script>";
            } else if (!$row["id"]) {
                echo "<script>alert('ایمیل یا پسورد اشتباه است ');
              document.location.href='../index.php';
              </script>";
            }
            }else{
                echo "<script>alert('شما بن شده اید | در صورت مشکل با پشتیبانی تماس بگیرید');
              document.location.href='../index.php';
              </script>";
            }
        } else {
            echo "<script>alert('کاربری با چنین مشخصات وجود ندارد');
              document.location.href='../index.php';
              </script>";
        }
    }
}else{
    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../index.php";
		</script>';
}