<?php
if(isset($_POST['delete']))
{
		require('connect.php');

		$id=$_POST["inputhidden"];

		$page=$_POST["page_id_hidden"];

    $id=mysqli_escape_string($sql,$id);

	$page=mysqli_escape_string($sql,$page);

    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `comment_news` WHERE id='$id'");
    }else{
        echo"<script>document.location.href='../show-comment-news.php?pageid=".$page."';</script>";
    }

    if(!$dl){
        echo"
        document.location.href='../show-comment-news.php?pageid=".$page."';</script>";
    }else{
        echo"<script>document.location.href='../show-comment-news.php?pageid=".$page."';</script>";
    }

}

?>
