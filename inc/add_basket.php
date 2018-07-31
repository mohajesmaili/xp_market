<?php
    $product_id = $_GET['product_id'];
    session_start();
    $user_id = $_SESSION["user_id"];

    require("connect.php");

    $insert = "INSERT INTO `basket` VALUES (NULL,'$user_id','$product_id',0)";

    $result = mysqli_query($sql, $insert);


    if($result){
        echo "<script>alert('ok');
              document.location.href='../index.php';
              </script>";

    }else{

        echo "<script>
			        alert('اضافه نشد');
			        document.location.href='../index.php';
			</script>";
    }