<?php
if(isset($_POST['delete']))
{ 
	require('../connect.php');

	$id=$_POST["inputhidden"];
	
    $id=mysqli_escape_string($sql,$id);

    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `admin` WHERE id='$id'");
    }else{
        echo"<script>document.location.href='../show-user.php';</script>";
    }

    if(!$dl){
        echo"<script>alert('ادمین حذف نشد');
        document.location.href='../show-user.php';</script>";
    }else{
        echo"<script>document.location.href='../show-user.php';</script>";
    }

}

?>