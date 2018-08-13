<?php
if(isset($_POST['delete']))
{ 
	require('connect.php');

	$id=$_POST["inputhidden"];

    $id=mysqli_escape_string($sql,$id);

    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `categoryp` WHERE id='$id'");
    }else{
        echo"<script>document.location.href='../show-categoryp.php';</script>";
    }

    if(!$dl){
        echo"<script>alert('دسته حذف نشد');
        document.location.href='../show-categoryp.php';</script>";
    }else{
        echo"<script>document.location.href='../show-categoryp.php';</script>";
    }

}

?>