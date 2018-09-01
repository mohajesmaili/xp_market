<?php
	require('connect.php');

	$id=$_REQUEST["id"];

    $page=$_REQUEST["page_id_hidden"];

	$vaziat=$_REQUEST["vaziat"];

    $id=mysqli_escape_string($sql,$id);

    $page=mysqli_escape_string($sql,$page);

    $vaziat=mysqli_escape_string($sql,$vaziat);

    session_start();

    if($_SESSION['login'] == true && $vaziat==0){

    $update=mysqli_query($sql,"UPDATE `comment_news` SET `vaziat`=1 WHERE `id`='$id' and `vaziat`=0");

		}else if($_SESSION['login'] == true && $vaziat==1){

		$update=mysqli_query($sql,"UPDATE `comment_news` SET `vaziat`=0 WHERE `id`='$id' and `vaziat`=1");

		}else {
        echo"<script>document.location.href='../show-comment-news.php?pageid=".$page."';</script>";
    }

    if(!$vaziat){
        echo"<script>
        document.location.href='../show-comment-news.php?pageid=".$page."';</script>";
    }else{
        echo"<script>document.location.href='../show-comment-news.php?pageid=".$page."';</script>";
    }

?>
