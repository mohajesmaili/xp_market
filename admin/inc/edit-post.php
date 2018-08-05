<?php 
error_reporting(0);
if(isset($_POST['submit']))
{
    $hiddenid=$_POST['hiddenid'];

	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){

		$title=$_POST['title'];	
		$date=$_POST['date'];	
		$first_content=$_POST['first_content'];	
		$content=$_POST['content'];	
		require("../connect.php");

		$title = htmlentities($title,ENT_QUOTES);              
		$date = htmlentities($date,ENT_QUOTES);
		$category = htmlentities($category,ENT_QUOTES);
		$admin = htmlentities($admin,ENT_QUOTES);

		$result=mysqli_query($sql,"UPDATE `blog_post` SET `title`='$title',`first_content`='$first_content',`content`='$content',`date`='$date' where id='$hiddenid'");
		$query=mysqli_query($sql,"SELECT `id` FROM `blog_post`");
		$row=mysqli_fetch_array($query);
		$id=$row['id'];
		$ferror=$_FILES['picture']['error'];
		if(!$ferror)
		{
		$fname=$_FILES['picture']['name']; 
		$ftype=$_FILES['picture']['type'];	
		$fsize=$_FILES['picture']['size'];	
		$ftemp=$_FILES['picture']['tmp_name'];
		if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" ){	
		move_uploaded_file($ftemp,"../../assets/img/blog_images/$hiddenid.jpg");
		}elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
		echo "<script>alert('فایل مشکل دارد');
		document.location.href='../edit-post.php?postid=".$hiddenid."';
		</script>";
		}
		}

		if($result)
		{
		echo"<script>alert('با موفقیت تغییر یافت');document.location.href='../show-post.php?pageid=1';</script>";

		}

		else{
		echo "<script>alert('پست آپدیت نشد');document.location.href='../show-post.php?pageid=1';</script>";
		}
    }else{			
		    echo '
			<script>
				    alert("کد اشتباه است")
			        document.location.href="../edit-post.php?postid='.$hiddenid.'";
			</script>';
		}
}
?>
