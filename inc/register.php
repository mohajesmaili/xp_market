<?php
if(isset($_POST['submit'])){

    $username=$_POST['inputUsernameRegister'];

    $password=$_POST['inputPasswordRegister'];

    $insert="INSERT INTO `user` VALUES (NULL,'$username','$password')";

    require("connect.php");

    $result=mysqli_query($sql,$insert);

    if(!$result){
        echo "<script>alert('ثبت نام با مشکل مواجه شد');
              document.location.href='../index.php';
              </script>";

    }else{

        echo "<script>
			        alert('ثبت نام موفقیت آمیز بود');
			        document.location.href='../index.php';
			</script>";
    }
}else{
    echo '
			<script>
				    alert("کد اشتباه است");
			        document.location.href="../index.php";
			</script>';
}
