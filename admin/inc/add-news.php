<?php
if(isset($_POST['submit'])){

	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){

			require('connect.php');

			require('../../inc/jalali-date.php');

			$title=$_POST['title'];

			$content=$_POST['content'];

			$date=jdate("Y-m-d",'','','',"en");

			$time=jdate("H:i:s",'','','',"en");


			$title = htmlentities($title,ENT_QUOTES);

			$result=mysqli_query($sql,"INSERT INTO `news` VALUES (NULL,'$title','$content','$date','$time')");

			if($result){
			echo "<script>alert('خبر اضافه شد');
			document.location.href='../show-news.php?pageid=1';
			</script>";

			}else{
			echo "<script>alert('خبر اضافه نشد');
			document.location.href='../show-news.php?pageid=1';
			</script>";
			}
	}else{
		    echo '
			<script>
				    alert("کد اشتباه است")
			        document.location.href="../add-news.php";
			</script>';
		}
}
?>
