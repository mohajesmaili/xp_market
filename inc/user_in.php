<?php
session_start();

if($_POST['captcha'] == $_SESSION['sacaptchaCode']){

if (isset($_POST['submit'])) {
    require ("connect.php");

    $name = $_POST['firstName'];

    $family=$_POST["lastName"];

    $tel=$_POST["telephone"];

    $address1=$_POST["addr1"];

    $address2=$_POST["addr2"];

    $city = $_POST['city'];

    $zip = $_POST['zip'];

    $user_id=$_SESSION["user_id"];

    $insert = "INSERT INTO `user_information` VALUES (NULL,'$name','$family','$tel','$address1','$address2','$city','$zip','$user_id')";

    $result = mysqli_query($sql, $insert);

    if ($result) {
        echo "<script>
			document.location.href='../checkout-step-3.php';
			</script>";
    }else{
        echo "<script>alert('اطلاعات وارد نشد مجددا سعی نمایید');
              document.location.href='../checkout-step-2.php';
              </script>";
    }
}
}else{
  echo '
      <script>
            alert("کد اشتباه است")
              document.location.href="../checkout-step-2.php";
      </script>';
}
