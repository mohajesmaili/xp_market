<?php
if(isset($_POST['delete']))
{ 
	require('../connect.php');

	$id=$_POST["inputhidden"];

    $id=mysqli_escape_string($sql,$id);
    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `blog_post` WHERE id='$id'");
    	mysqli_query($sql,"DELETE FROM `comment_blog` where postid='$id'");
    }else{
        echo"<script>document.location.href='../show-post.php?pageid=1';</script>";
    }


    if(!$dl){
        echo"<script>alert('پیام حذف نشد');
        document.location.href='../show-posts.php?pageid=1';</script>";
    }else{
        echo"<script>document.location.href='../show-post.php?pageid=1';</script>";
    }

}

?>