<?php
error_reporting(0);
session_start();
$_SESSION['login'] = false;
if(isset($_POST['submit'])){

    $name=$_POST['inputEmail'];

    $password=$_POST['inputPassword'];

    $insert="SELECT * FROM `user` WHERE username='$name' && password='$password'";

    require("connect.php");

    $result=mysqli_query($sql,$insert);

    $row=mysqli_fetch_array($result);

    if($row["id"]){
        $_SESSION["user"]=true;
        $_SESSION["user_id"]=$row["id"];
        $_SESSION["user_name"]=$row["username"];
        echo "<script>
			        document.location.href='../index.php';
			</script>";

    } else if(!$row["id"]){
        echo "<script>alert('نام کاربری یا پسورد اشتباه است');
              document.location.href='../index.php';
              </script>";

    }
}