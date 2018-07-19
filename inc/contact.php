<?php
if(isset($_POST['submit'])) {

    $name = $_POST['name'];

    $email = $_POST['email'];

    $comment = $_POST['comment'];

    require("connect.php");

    $insert = "INSERT INTO `contact` VALUES (NULL,'$name','$email','$comment')";

    $result = mysqli_query($sql, $insert);


    if(!$result){
        echo "<script>alert('پیام ارسال نشد');
              document.location.href='../contact.php';
              </script>";

    }else{

        echo "<script>
			        alert('پیام ارسال شد');
			        document.location.href='../contact.php';
			</script>";
    }
    }else{
    echo '
			<script>
				    alert("کد اشتباه است");
			        document.location.href="../contact.php";
			</script>';
    }