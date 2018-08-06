<?php
if(isset($_POST['submit'])){
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

				require('connect.php');

				$name = htmlentities($name,ENT_QUOTES);
				$code = htmlentities($code,ENT_QUOTES);
				$price = htmlentities($price,ENT_QUOTES);
				$categoryp = htmlentities($categoryp,ENT_QUOTES);
				$categoryb = htmlentities($categoryb,ENT_QUOTES);
				$description = htmlentities($description,ENT_QUOTES);
				$special = htmlentities($special,ENT_QUOTES);
				$number = htmlentities($number,ENT_QUOTES);

        		$result=mysqli_query($sql,"INSERT INTO `product` VALUES (NULL,'$name','$code','$categoryp','$categoryb','$price','$description','$number','$special')");
				$query=mysqli_query($sql,"select max(`id`) as id from `product`");
				$row=mysqli_fetch_array($query);
				$maxid=$row['id'];
				$ferror=$_FILES['picture']['error'];
				if(!$ferror)
				{
				$fname=$_FILES['picture']['name'];
				$ftype=$_FILES['picture']['type'];	
				$fsize=$_FILES['picture']['size'];	
				$ftemp=$_FILES['picture']['tmp_name'];	
				if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png"){
				move_uploaded_file($ftemp,"../../images/product/$maxid.png");
				}elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
				echo "<script>alert('فایل مشکل دارد');
				document.location.href='../show-product.php?pageid=1';
				</script>";
				}
				}

				if($result){
				echo "<script>alert('کالا اضافه شد');
				document.location.href='../show-product.php?pageid=1';
				</script>";

				}else{	
				echo "<script>alert('کالا اضافه نشد');
				document.location.href='../show-product.php?pageid=1';
				</script>";
				}
    }else{			
	    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../add-product.php";
		</script>';
	}			
}
?>
