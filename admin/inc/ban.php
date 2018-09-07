<?php
	require('connect.php');

	$id=$_REQUEST["id"];

    $page=$_REQUEST["page_id_hidden"];

	$status=$_REQUEST["status"];

    $id=mysqli_escape_string($sql,$id);

    $page=mysqli_escape_string($sql,$page);

    $status=mysqli_escape_string($sql,$status);

    session_start();

    if($_SESSION['login'] == true && $status==0){

    $update=mysqli_query($sql,"UPDATE `user` SET `status`=1 WHERE `id`='$id' and `status`=0");

		}else if($_SESSION['login'] == true && $status==1){

		$update=mysqli_query($sql,"UPDATE `user` SET `status`=0 WHERE `id`='$id' and `status`=1");

		}else {
        echo"<script>document.location.href='../show-users.php?pageid=".$page."';</script>";
    }

    if(!$update){
        echo"<script>document.location.href='../show-users.php?pageid=".$page."';</script>";
    }else{
        echo"<script>document.location.href='../show-users.php?pageid=".$page."';</script>";
    }

?>
