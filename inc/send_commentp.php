<?php
if(isset($_POST['submit'])) {
    require("connect.php");
    require ("jalali-date.php");

    $userid = $_GET['userid'];

    $product_id = $_GET['productid'];

    $category_id = $_GET['categoryid'];

    $comment = $_POST['comment'];

    $date=jdate("Y-m-d",'','','',"en");

    $time=jdate("H:i:s",'','','',"en");

    $insert = "INSERT INTO `comment_product` VALUES (NULL,'$product_id','$userid','$comment','$date','$time')";

    $result = mysqli_query($sql, $insert);
    if(!$result){
        echo "<script>alert('پیام ارسال نشد');
              document.location.href='../product.php?productid=".$product_id."&categoryid=".$category_id."';
              </script>";


    }else{
        echo "<script>
			        alert('پیام ارسال شد');
			        document.location.href='../product.php?productid=".$product_id."&categoryid=".$category_id."';
			</script>";
    }
}