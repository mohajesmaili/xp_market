<?php
if(isset($_POST['delete']))
{
	require('connect.php');

	$id=$_POST["inputhidden"];

    $id=mysqli_escape_string($sql,$id);

    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `comment_product` WHERE id='$id'");
    }else{
        echo"<script>document.location.href='../show-comment-product.php?pageid=1';</script>";
    }

    if(!$dl){
        echo"
        document.location.href='../show-comment-product.php?pageid=1.php';</script>";
    }else{
        echo"<script>document.location.href='../show-comment-product.php?pageid=1';</script>";
    }

}

?>
