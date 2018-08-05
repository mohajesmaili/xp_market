<?php 
error_reporting(0);
if(isset($_POST['submit']))
{
	$hiddenid=$_POST['hiddenid'];
	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
	if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$name=$_POST['name'];	
			$semat=$_POST['semat'];		
			$permission=$_POST['permission'];	
			$us=$_POST['us'];		
			require("../connect.php");
			$name = htmlentities($name,ENT_QUOTES);                           
			$semat = htmlentities($semat,ENT_QUOTES);              
			$permission = htmlentities($permission,ENT_QUOTES);              
			$us = htmlentities($us,ENT_QUOTES);

			$result=mysqli_query($sql,"UPDATE `admin` SET `name`='$name',`semat`='$semat',`permission`='$permission',`us`='$us' WHERE id='$hiddenid'");
			$query=mysqli_query($sql,"SELECT `id` FROM `admin`");
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
			move_uploaded_file($ftemp,"../../assets/img/admin/$hiddenid.jpg");
			}elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
			    echo "<script>alert('فایل مشکل دارد');
				document.location.href='../edit-admin.php?adminid=".$hiddenid."';
				</script>";
			    }
			}

			if($result)
			{
				echo"<script>alert('با موفقیت تغییر یافت');document.location.href='../show-user.php';</script>";
			 
			}

			else{
			 echo "<script>alert('پست آپدیت نشد');document.location.href='../show-user.php';</script>";
			}
	}else{			
    echo '
	<script>
		    alert("کد اشتباه است")
	        document.location.href="../edit-admin.php?adminid='.$hiddenid.'";
	</script>';
    }
}
?>
