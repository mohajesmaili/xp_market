<?php
if(isset($_POST['delete']))
{
	require('connect.php');

	$id=$_POST["inputhidden"];

    $id=mysqli_escape_string($sql,$id);

    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `product` WHERE id='$id'");
    }else{
        echo"<script>document.location.href='../show-product.php?pageid=1';</script>";
    }

    if(!$dl){
        echo"<script>alert('کالا حذف نشد');

        document.location.href='../show-product.php?pageid=1';</script>";
    }else{

				unlink("../../images/product/$id.png");

				unlink("../../images/product_s/$id.png");

				for($i=0;$i<=6;$i++){

				unlink("../../images/more_p/$id-($i).png");

				}

				echo"<script>document.location.href='../show-product.php?pageid=1';</script>";
    }

}
