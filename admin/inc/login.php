<?php
session_start();
$_SESSION['login'] = false;
if(isset($_POST["submit"])){
									    									
$us=$_POST["us"];

$pw=$_POST["pw"];


require('../connect.php');

$us=mysqli_escape_string($sql,$us);

$pw=mysqli_escape_string($sql,$pw);

$pw=sha1($pw);


$result=mysqli_query($sql,"SELECT * FROM `admin` WHERE `us`='$us' AND `pw`='$pw'");
$row=mysqli_fetch_array($result);
                                   
if($row['id']){
    $_SESSION['login'] = true;
    echo "<script>document.location.href='../index.php';</script>";
    $_SESSION["div-right"]=$row["id"];
    $_SESSION["permission"]=$row["permission"];    
}

else if(!$row['id']){
   echo "<script>document.location.href='../login.php';</script>";

}

}
?>
