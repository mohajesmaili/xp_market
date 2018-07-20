<?php
if(isset($_POST['submit'])) {
    $userid = $_GET['userid'];

    $product_id = $_GET['productid'];

    $category_id = $_GET['categoryid'];

    $comment = $_POST['comment'];

    require("connect.php");
    $insert = "INSERT INTO `comment_product` VALUES (NULL,'$product_id','$userid','$comment')";

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