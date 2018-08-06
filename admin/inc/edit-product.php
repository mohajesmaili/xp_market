<?php 
error_reporting(0);
if(isset($_POST['submit']))
{
    $hiddenid=$_POST['hiddenid'];
	$hiddenid=htmlentities($hiddenid,ENT_QUOTES);
	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$name=$_POST['name'];
			$code=$_POST["code"];
			$price=$_POST["price"];
			$categoryp=$_POST["categoryp"];
			$categoryb=$_POST["categoryb"];
			$description=$_POST['description'];
			$special=$_POST['special'];
			$number=$_POST['number'];

			require("connect.php");
            $name = htmlentities($name,ENT_QUOTES);
            $code = htmlentities($code,ENT_QUOTES);
            $price = htmlentities($price,ENT_QUOTES);
            $categoryp = htmlentities($categoryp,ENT_QUOTES);
            $categoryb = htmlentities($categoryb,ENT_QUOTES);
            $description = htmlentities($description,ENT_QUOTES);
            $special = htmlentities($special,ENT_QUOTES);
            $number = htmlentities($number,ENT_QUOTES);

			$result=mysqli_query($sql,"UPDATE `product` SET `name`='$name',`code`='$code',`categoryp`='$categoryp',`categoryb`='$categoryb',`price`='$price',`Description`='$description',`number`='$number',`special`='$special' WHERE id='$hiddenid'");
			$query=mysqli_query($sql,"SELECT `id` FROM `product`");
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
			move_uploaded_file($ftemp,"../../images/product/$hiddenid.png");
			}elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
			echo "<script>alert('فایل مشکل دارد');
			document.location.href='../edit-product.php?productid=".$hiddenid."';
			</script>";
			} 
			}

			if($result)
			{
			echo"<script>alert('با موفقیت تغییر یافت');
            document.location.href='../show-product.php?pageid=1';</script>";

			}

			else{
			echo "<script>alert('دوره آپدیت نشد');
            document.location.href='../show-product.php?pageid=1';</script>";
			}
	}else{			
	    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../edit-product.php?productid='.$hiddenid.'";
		</script>';
	}
}
?>
