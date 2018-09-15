<?php
require ("connect.php");

session_start();

$user_id=$_SESSION["user_id"];

$SELECT="SELECT * FROM `user_information` WHERE user_id='$user_id'";

$result = mysqli_query($sql, $SELECT);

if (mysqli_num_rows($result)==1) {
    echo "<script>   
			document.location.href='../checkout-step-3.php';
			</script>";
}else{
    echo "<script>
          document.location.href='../checkout-step-2.php';
          </script>";
}