<?php
if(isset($_POST['delete']))
{ 
	require('../connect.php');

	$id=$_POST["inputhidden"];

	$id=mysqli_escape_string($sql,$id);

    session_start();
    if($_SESSION['login'] == true){
    $dl=mysqli_query($sql,"DELETE FROM `tutorails_learn` WHERE id='$id'");
    }else{        
        echo"<script>document.location.href='../show-learns.php?pageid=1';</script>";
    }

    if(!$dl){
        echo"<script>alert('آموزش حذف شد');
        document.location.href='../show-learns.php?pageid=1';</script>";
    }else{
        echo"<script>document.location.href='../show-learns.php?pageid=1';</script>";
    }

}

?>