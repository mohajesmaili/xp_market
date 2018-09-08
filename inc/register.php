<?php
session_start();
require("connect.php");
if($_POST['captcha'] == $_SESSION['sacaptchaCode']) {
    if (isset($_POST['submit'])) {

        $username = $_POST['inputUsernameRegister'];

        $password = $_POST['inputPasswordRegister'];

        $insert2 = "SELECT * FROM `user` WHERE username='$username'";

        $result2 = mysqli_query($sql, $insert2);
        if (mysqli_num_rows($result2) == 0) {

            $insert = "INSERT INTO `user` VALUES (NULL,'$username','$password',0)";

            $result = mysqli_query($sql, $insert);

            if (!$result) {
                echo "<script>alert('ثبت نام با مشکل مواجه شد');
              document.location.href='../index.php';
              </script>";

            } else {

                echo "<script>
			        alert('ثبت نام موفقیت آمیز بود');
			        document.location.href='../index.php';
			</script>";
            }
        } else {
            echo "<script>
			        alert('این نام کاربری قبلا ثبت شده است');
			        document.location.href='../index.php';
			</script>";
        }
    }
    } else {
        echo '
			<script>
				    alert("کد اشتباه است");
			        document.location.href="../index.php";
			</script>';
    }
