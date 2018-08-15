<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    $hiddenid=$_POST['hiddenid'];

	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
		require("connect.php");

		$title=$_POST['title'];

		$content=$_POST['content'];

		$title = htmlentities($title,ENT_QUOTES);


		$result=mysqli_query($sql,"UPDATE `news` SET `subject`='$title',`content`='$content' where id='$hiddenid'");


		if($result)
		{
		echo"<script>alert('با موفقیت تغییر یافت');document.location.href='../show-news.php?pageid=1';</script>";

		}

		else{
		echo "<script>alert('خبر ویرایش نشد');document.location.href='../show-news.php?pageid=1';</script>";
		}
    }else{
		    echo '
			<script>
				    alert("کد اشتباه است")
			        document.location.href="../edit-news.php?postid='.$hiddenid.'";
			</script>';
		}
}
?>
