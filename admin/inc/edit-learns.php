<?php 
error_reporting(0);
if(isset($_POST['submit']))
{
	$hiddenid=$_POST['hiddenid'];
	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$title=$_POST['title'];	
			$content=$_POST['content'];		
			require("../connect.php");
			$title = htmlentities($title,ENT_QUOTES);              


			$result=mysqli_query($sql,"UPDATE `tutorails_learn` SET `title`='$title',`content`='$content' where id='$hiddenid'");

			if($result)
			{
			echo"<script>alert('با موفقیت تغییر یافت');document.location.href='../show-learns.php?pageid=1';</script>";

			}

			else{
			echo "<script>alert('آموزش آپدیت نشد');document.location.href='../show-learns.php?pageid=1';</script>";
			}
  	}else{			
	    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../edit-learns.php?learnid='.$hiddenid.'";
		</script>';
	}
}	
?>
