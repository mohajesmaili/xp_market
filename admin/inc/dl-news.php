<?php
if(isset($_POST['delete']))
{
	require('connect.php');

	$id=$_POST["inputhidden"];

    $id=mysqli_escape_string($sql,$id);
    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `news` WHERE id='$id'");
    	mysqli_query($sql,"DELETE FROM `comment_news` where newsid='$id'");
    }else{
        echo"<script>document.location.href='../show-news.php?pageid=1';</script>";
    }


    if(!$dl){
        echo"<script>alert('پیام حذف نشد');
        document.location.href='../show-news.php?pageid=1';</script>";
    }else{
        echo"<script>document.location.href='../show-news.php?pageid=1';</script>";
    }

}

?>
