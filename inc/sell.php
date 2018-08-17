<?php

require("connect.php");

session_start();

$user_id = $_SESSION["user_id"];

$result2=mysqli_query($sql,"SELECT * FROM `basket` WHERE user_id='$user_id' and sell=0");

while($row=mysqli_fetch_assoc($result2)) {

    $pid = $row["product_id"];
    mysqli_query($sql, "UPDATE `product` SET `number`=`number` - 1  WHERE `id`='$pid'");
}

$update = "UPDATE `basket` SET `sell`=1  WHERE user_id='$user_id'";

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
