<?php
error_reporting(0);

if(isset($_POST['submit'])) {
    session_start();

    $product_id = $_GET['productid'];

    $category_id = $_GET['categoryid'];

    if($_POST['captcha1'] == $_SESSION['sacaptchaCode'] || $_POST['captcha'] == $_SESSION['sacaptchaCode']){

    require("connect.php");

    require ("jalali-date.php");

    $comment_id=$_POST["hiddenid"];

    $userid = $_GET['userid'];

    $comment = $_POST['comment'];

    $date=jdate("Y-m-d",'','','',"en");

    $time=jdate("H:i:s",'','','',"en");

    if($comment_id==null || $comment_id=="") {

        $insert = "INSERT INTO `comment_product` VALUES (NULL,'$product_id','$userid','$comment','$date','$time',0,0)";
    }else{
        $insert = "INSERT INTO `comment_product` VALUES (NULL,'$product_id','$userid','$comment','$date','$time',0,'$comment_id')";
    }

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
    }else{
        echo "
		<script>
			    alert('کد اشتباه است');
		        document.location.href='../product.php?productid=".$product_id."&categoryid=".$category_id."';
		</script>";
    }

}
