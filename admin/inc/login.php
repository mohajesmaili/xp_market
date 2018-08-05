<?php
session_start();
$_SESSION['login'] = false;
if(isset($_POST["submit"])){
									    									
$us=$_POST["us"];

$pw=$_POST["pw"];


require('connect.php');

$us=mysqli_escape_string($sql,$us);

$pw=mysqli_escape_string($sql,$pw);

$result=mysqli_query($sql,"SELECT * FROM `admin` WHERE `username`='$us' AND `password`='$pw'");

$row=mysqli_fetch_array($result);
                                   
if($row['id']){
    $_SESSION['login'] = true;
    $_SESSION["div-right"]=$row["id"];
    $_SESSION["permission"]=$row["permission"];
    echo "<script>document.location.href='../index.php';
</script>";
}

else if(!$row['id']){
   echo "<script>document.location.href='../login.php';</script>";

}

}
?>
