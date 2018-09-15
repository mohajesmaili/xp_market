<?php

require ("connect.php");

session_start();

$product_id=$_GET["p_id"];

$user_id=$_SESSION["user_id"];

$delete="DELETE FROM `basket` WHERE user_id='$user_id' AND product_id='$product_id' AND sell=0";

$result = mysqli_query($sql, $delete);

if ($result) {
    echo "<script>   
			document.location.href='../index.php';
			</script>";
}else{
    echo "<script>
          document.location.href='../index.php';
          </script>";
}