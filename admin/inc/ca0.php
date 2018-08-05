<?php
	require('../connect.php');

	$id=$_REQUEST["ca0"];

    $id=mysqli_escape_string($sql,$id); 

    session_start();
    if($_SESSION['login'] == true){
    $ca0=mysqli_query($sql,"UPDATE `comment_blog` SET `vaziat`=1 WHERE `id`='$id'");
    }else{
        echo"<script>document.location.href='../show-comment-post.php?pageid=1';</script>";
    } 

    if(!$ca0){
        echo"<script>
        document.location.href='../show-comment-post.php?pageid=1.php';</script>";
    }else{
        echo"<script>document.location.href='../show-comment-post.php?pageid=1';</script>";
    }

?>