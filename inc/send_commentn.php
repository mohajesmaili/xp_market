<?php
if(isset($_POST['submit'])) {
    $userid = $_GET['userid'];

    $news_id = $_GET['newsid'];

    $comment = $_POST['comment'];

    require("connect.php");
    $insert = "INSERT INTO `comment_news` VALUES (NULL,'$news_id','$userid','$comment')";

    $result = mysqli_query($sql, $insert);
    if(!$result){
        echo "<script>alert('پیام ارسال نشد');
              document.location.href='../blog-single.php?newsid=".$news_id."';
              </script>";


    }else{
        echo "<script>
			        alert('پیام ارسال شد');
			        document.location.href='../blog-single.php?newsid=".$news_id."';
			</script>";
    }
}