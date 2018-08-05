<?php
if(isset($_POST['delete']))
{ 
	require('../connect.php');

	$id=$_POST["inputhidden"];

    $id=mysqli_escape_string($sql,$id);

    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `blog_category` WHERE id='$id'");
    }else{
        echo"<script>document.location.href='../show-category.php';</script>";
    }

    if(!$dl){
        echo"<script>alert('دسته جذف نشد');
        document.location.href='../show-category.php';</script>";
    }else{
        echo"<script>document.location.href='../show-category.php';</script>";
    }

}

?>