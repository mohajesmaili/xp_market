<?php
	require('../connect.php');

	$id=$_REQUEST["cv0"];

    $id=mysqli_escape_string($sql,$id); 

    session_start();
    if($_SESSION['login'] == true){
    $cv0=mysqli_query($sql,"UPDATE `comment_learn` SET `vaziat`=1 WHERE `id`='$id'");
    }else{
        echo"<script>document.location.href='../show-comment-learn.php?pageid=1';</script>";
    }

    if(!$cv0){
        echo"<script>document.location.href='../show-comment-learn.php?pageid=1';</script>";
    }else{
        echo"<script>document.location.href='../show-comment-learn.php?pageid=1';</script>";
    }

?>