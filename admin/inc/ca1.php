<?php
    require('../connect.php');

    $id=$_REQUEST["ca1"];

    $id=mysqli_escape_string($sql,$id);    

    session_start();
    if($_SESSION['login'] == true){
    $ca1=mysqli_query($sql,"UPDATE `comment_blog` SET `vaziat`=0 WHERE `id`='$id'");
    }else{
        echo"<script>document.location.href='../show-comment-post.php?pageid=1';</script>";
    } 

    if(!$ca1){
        echo"<script>
        document.location.href='../show-comment-post.php?pageid=1.php';</script>";
    }else{
        echo"<script>document.location.href='../show-comment-post.php?pageid=1';</script>";
    }

?>