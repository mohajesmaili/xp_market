<?php
error_reporting(0);
session_start();
$_SESSION['login'];
if(!$_SESSION['login']){
  echo "<script>document.location.href='login.php'</script>";
  }
$_SESSION["permission"];
if($_SESSION["permission"]!=1){
  echo "<script>
        alert('شما اجازه ورود به این قسمت را ندارید');
        document.location.href='index.php';
        </script>";
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>XP_Market | ویرایش کالا</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="assets/js/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="assets/js/ckfinder/ckfinder.js" type="text/javascript"></script>
    <script>
        function validateForm(){
            var name = document.forms["form"]["name"].value;
            var code = document.forms["form"]["code"].value;
            var categoryp = document.forms["form"]["categoryp"].value;
            var categoryb = document.forms["form"]["categoryb"].value;
            var price = document.forms["form"]["price"].value;
            var special = document.forms["form"]["special"].value;
            var number = document.forms["form"]["number"].value;
            var captcha = document.forms["form"]["captcha"].value;
            if (name == null || name == ""){
                document.getElementById('name').style="border:1px solid #D40000";
                return false;
            }
            else if (code == null || code == ""){
                document.getElementById('code').style="border:1px solid #D40000";
                return false;
            }else if (categoryp== null || categoryp == ""){
                document.getElementById('categoryp').style="border:1px solid #D40000";
                return false;
            }else if (categoryb== null || categoryb == ""){
                document.getElementById('categoryb').style="border:1px solid #D40000";
                return false;
            }else if (price== null || price== ""){
                document.getElementById('price').style="border:1px solid #D40000";
                return false;
            }else if (special== null || special == ""){
                document.getElementById('special').style="border:1px solid #D40000";
                return false;
            }else if (number== null || number == ""){
                document.getElementById('number').style="border:1px solid #D40000";
                return false;
            }
            else if (captcha == null || captcha == ""){
                document.getElementById('captcha').style="border:1px solid #D40000;margin-top:10px;width:169px";
                return false;
            }
            return true
        }
    </script>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
 <?php require("inc/header.php") ?>

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside style="float: right;margin-right: 210px;">
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <?php require("inc/admin-right.php") ?>
                  <li class="mt">
                      <a  href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>داشبورد</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>دوره ها</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="show-product.php?pageid=1">نمایش کالا</a></li>
                          <li><a  href="add-product.php">اضافه کردن کالا</a></li>
                          <li><a  href="show-sproduct.php?pageid=1">نمایش کالا فروخته شده</a></li>
                          <li><a  href="show-comment-product.php?pageid=1">مشاهده نظرات</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-list-alt"></i>
                          <span>دسته بندی کالا</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-categoryp.php">مشاهده دسته ها</a></li>
                          <li><a  href="add-categoryp.php">اضافه کردن دسته</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th-list"></i>
                          <span>دسته بندی برند</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-categoryb.php?pageid=1">مشاهده برند</a></li>
                          <li><a  href="add-categoryb.php">اضافه کردن برند</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-pencil"></i>
                          <span>اخبار</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-news.php?pageid=1">مشاهده اخبار</a></li>
                          <li><a  href="add-news.php">اضافه کردن خبر</a></li>
                          <li><a  href="show-comment-news.php?pageid=1">مشاهده نظرات</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="li_user"></i>
                          <span>کاربران</span>
                      </a>
                      <ul class="sub">
                          <li ><a  href="show-users.php?pageid=1">نمایش کاربران</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="contact.php?pageid=1" >
                          <i class="fa fa-comment"></i>
                          <span>پیام کاربران</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

                  <div class="form-panel">
                      <h4 class="mb">ویرایش کالا</h4>
                      <form class="form-horizontal style-form" method="post" action="inc/edit-product.php" name="form" onsubmit="return validateForm();" enctype="multipart/form-data">
                        <?php
                          $id=$_REQUEST['productid'];
                          $id = htmlentities($id, ENT_QUOTES, "UTF-8");
                          $id = str_replace("<", "&lt;", $id);
                          $id = str_replace(">", "&gt;", $id);
                          $id = str_replace("script", "", $id);
                          $id=filter_var($id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                          require("inc/connect.php");
                          $id=mysqli_escape_string($sql,$id);
                          $edit_product=("SELECT * FROM `product` where id='$id'");
                          $result=mysqli_query($sql,$edit_product);
                          if(mysqli_num_rows($result) > 0){
                          $row=mysqli_fetch_array($result);
                          echo '<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">نام :</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="name" name="name" class="form-control round-form" type="text" placeholder="نام" value="'.$row["name"].'" onblur="CheckEmpty();">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">کد :</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="code" name="code" class="form-control round-form" type="number" placeholder="کد" value="'.$row["code"].'" onblur="CheckEmpty();">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">دسته بندی :</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <select id="categoryp" name="categoryp" class="form-control round-form"  onblur="CheckEmpty();">';
                                      $categoryp=("Select categoryp.* from `categoryp`,`product` WHERE categoryp.id=product.categoryp and product.id='$id'");
                                      $resul=mysqli_query($sql,$categoryp);
                                      while($row2=mysqli_fetch_assoc($resul)) {
                                          echo '<option value="'.$row2["id"].'">' . $row2["name"] . '</option>';
                                      }
                              echo '</select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> برند :</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <select id="categoryb" name="categoryb" class="form-control round-form" onblur="CheckEmpty();">';
                                      $categoryb=("Select categoryb.* from `categoryb`,`product` WHERE categoryb.id=product.categoryb and product.id='$id'");
                                      $resu=mysqli_query($sql,$categoryb);
                                      while($row3=mysqli_fetch_assoc($resu)) {
                                          echo '<option value="'.$row3["id"].'">' . $row3["name"] . '</option>';
                                      }
                              echo '</select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">قیمت :</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="price" name="price" class="form-control round-form"  type="number" placeholder="قیمت" value="'.$row["price"].'" onblur="CheckEmpty();">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">متن:</label>
                              <div class="col-sm-10" style="margin-right: -100px;width: 900px">
                                  <textarea  id="description" name="description" >
                                  '.$row["Description"].'
                                  </textarea>
                                  <script>
                                     CKEDITOR.replace( \'description\', {
                                     customConfig: \'custom/editor_full_config.js\',});
                                     CKFinder.setupCKEditor(null, \'assets/js/ckfinder/\');
                                  </script>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">محصول ویژه</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <select id="special" name="special" class="form-control round-form" onblur="CheckEmpty();">';
                                  if($row["special"]==1){
                                   echo '<option value="1" selected>بله</option>
                                         <option value="0" >خیر</option>';
                                  }elseif($row["special"]==0){
                                  echo'<option value="0" selected>خیر</option>
                                       <option value="1">بله</option>';
                                  }

                              echo '</select>
                          </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">تعداد</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="number" name="number" onblur="CheckEmpty();" class="form-control round-form" value="'.$row["number"].'" type="number" placeholder="تعداد">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">عکس فعلی :</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <img src="../images/product_s/'.$row["id"].'.png">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ارسال عکس:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                <input id="picture" name="picture" onblur="CheckEmpty();" class="round-form" type="file" placeholder="ارسال فایل">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">کد امنیتی:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">';

                                  $sa_captchaDIR="assets/sc/sa-captcha";
                                  require("assets/sc/sa-captcha/captcha.php");

                            echo'<input id="captcha" name="captcha" style="margin-top:10px;width:169px" class="form-control round-form" type="text" placeholder="کد امنیتی" onblur="CheckEmpty();">
                              </div>
                          </div>
                          <input type="hidden" value="'.filter_var($id, FILTER_SANITIZE_NUMBER_INT).'" name="hiddenid"/>
                          <button type="submit" name="submit" class="btn btn-success">ارسال</button>
                          <button type="button" type="reset" class="btn btn-danger">حذف</button>
                      </form>
                     </div>
                  </div>';
                   }
                  ?>

          </section>
      </section>

      <!--main content end-->

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
	<script src="assets/js/zabuto_calendar.js"></script>

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>


  </body>
</html>
