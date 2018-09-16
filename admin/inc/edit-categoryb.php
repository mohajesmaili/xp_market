<?php
error_reporting(0);
if(isset($_POST['submit']))
{
	$hiddenid=$_POST['hiddenid'];
	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
	if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$name=$_POST['name'];
			require("connect.php");
			$name = htmlentities($name,ENT_QUOTES);

			$result=mysqli_query($sql,"UPDATE `categoryb` SET `name`='$name' where id='$hiddenid'");

			$ferror=$_FILES['picture']['error'];
			if(!$ferror)
			{
				$fname=$_FILES['picture']['name'];
				$ftype=$_FILES['picture']['type'];
				$fsize=$_FILES['picture']['size'];
				$ftemp=$_FILES['picture']['tmp_name'];
				if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" ){
					move_uploaded_file($ftemp,"../../images/brand/$hiddenid.png");
				}elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
					echo "<script>alert('فایل مشکل دارد');
				document.location.href='../edit-categoryb.php?categoryb_id=".$hiddenid."';
				</script>";
				}
			}

			if($result)
			{
			echo"<script>alert('با موفقیت تغییر یافت');document.location.href='../show-categoryb.php?pageid=1';</script>";

			}

			else{
			echo "<script>alert('برند آپدیت نشد');document.location.href='../show-categoryb.php?pageid=1';</script>";
			}
	}else{
    echo '
	<script>
		    alert("کد اشتباه است")
	        document.location.href="../edit-categoryb.php?categoryb_id='.$hiddenid.'";
	</script>';
}
}
?>
