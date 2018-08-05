<?php 
error_reporting(0);
if(isset($_POST['submit']))
{
	$hiddenid=$_POST['hiddenid'];
	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
	if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$pass=$_POST['pass'];	
			$new_pass=$_POST['new-pass'];		
			$rn_pass=$_POST['rn-pass'];
			$pass=sha1($pass);
			$new_pass=sha1($new_pass);
			$rn_pass=sha1($rn_pass);			
			require("../connect.php");
			$pass = htmlentities($pass,ENT_QUOTES);
			$new_pass = htmlentities($new_pass,ENT_QUOTES);              
			$rn_pass = htmlentities($rn_pass,ENT_QUOTES); 
			$test=mysqli_query($sql,"SELECT * FROM `admin` WHERE id='$hiddenid'");
			$r=mysqli_fetch_array($test);
			if($r['pw'] === $pass){    
			if($new_pass === $rn_pass){                                    
			$result=mysqli_query($sql,"UPDATE `admin` SET pw='$new_pass' WHERE id='$hiddenid'");

			if($result)
			{
				echo"<script>alert('با موفقیت تغییر یافت');document.location.href='../show-user.php';</script>";
			 
			}else{
			 echo "<script>alert('پست آپدیت نشد');document.location.href='../show-user.php';</script>";
			}
		}else{
			echo"<script>alert('تکرار پسورد را درست وارد نکردید');document.location.href='../edit-pass.php?adminid=".$hiddenid."';</script>";
		}
		}else{
			echo"<script>alert('پسورد فعلی اشتباه است');document.location.href='../edit-pass.php?adminid=".$hiddenid."';</script>";
		}
	}else{			
    echo'
	<script>
		    alert("کد اشتباه است")
	        document.location.href="../edit-pass.php?adminid='.$hiddenid.'";
	</script>';
    }
}
?>
