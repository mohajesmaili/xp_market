<?php 
error_reporting(0);
if(isset($_POST['submit']))
{
	$hiddenid=$_POST['hiddenid'];
	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
	if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$name=$_POST['name'];	
			require("../connect.php");
			$name = htmlentities($name,ENT_QUOTES);              

			$result=mysqli_query($sql,"UPDATE `blog_category` SET `name`='$name' where id='$hiddenid'");

			if($result)
			{
			echo"<script>alert('با موفقیت تغییر یافت');document.location.href='../show-category.php';</script>";

			}

			else{
			echo "<script>alert('دوره آپدیت نشد');document.location.href='../show-category.php';</script>";
			}
	}else{			
    echo '
	<script>
		    alert("کد اشتباه است")
	        document.location.href="../edit-category.php?categoryid='.$hiddenid.'";
	</script>';
}
}
?>
