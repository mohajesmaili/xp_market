<?php
    error_reporting(0);
    session_start();
    require("connect.php");

    require ("jalali-date.php");

    $number=$_POST["num"];

    $product_id = $_GET['product_id'];

    $user_id = $_SESSION["user_id"];

    $date = jdate("Y-m-d", '', '', '', "en");

    $insert = "INSERT INTO `basket` VALUES (NULL,'$user_id','$product_id',0,'$date')";
    if($number==0){
        $result = mysqli_query($sql, $insert);
    }else {
        for ($i = 1; $i <= $number; $i++) {
            $result = mysqli_query($sql, $insert);
        }
    }


    if($result){
        echo "<script>
              document.location.href='../index.php';
              </script>";

    }else{

        echo "<script>
			        alert('اضافه نشد');
			        document.location.href='../index.php';
			</script>";
    }
