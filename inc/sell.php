<?php

require("connect.php");

session_start();

$user_id = $_SESSION["user_id"];

$update = "UPDATE `basket` SET `sell`=1 WHERE user_id='$user_id'";

$result = mysqli_query($sql, $update);

if($result){
    echo "<script>alert('خرید انجام گرفت');
              document.location.href='../index.php';
              </script>";

}else{

    echo "<script>
			        alert('خرید انجام نگرفت');
			        document.location.href='../index.php';
			</script>";
}