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

    <title>XP_Market | کالا فروخته شده</title>

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
    <script>
        function dl()
         {
            a=confirm('آیا برای حذف مطمئنید؟');
            if(a==false) {
                return false;
            }
            else {
                return true;
            }
         }
    </script>

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <?php require('inc/header.php') ?>

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
                          <span>کالا</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-product.php?pageid=1">نمایش کالا</a></li>
                          <li><a  href="add-product.php">اضافه کردن کالا</a></li>
                          <li class="active"><a  href="add-product.php">نمایش کالا فروخته شده</a></li>
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
                          <li><a  href="show-categoryb.php">مشاهده برند</a></li>
                          <li><a  href="add-categoryb.php">اضافه کردن برند</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-pencil"></i>
                          <span>مقالات</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-post.php?pageid=1">مشاهده مقالات</a></li>
                          <li><a  href="add-post.php">اضافه کردن مقاله</a></li>
                          <li><a  href="show-comment-post.php?pageid=1">مشاهده نظرات</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="li_user"></i>
                          <span>کاربران</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-user.php">نمایش کاربران</a></li>
                          <li><a  href="add-user.php">اضافه کردن کاربر</a></li>
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

                  <div class="col-md-12" style="margin-top: 20px;">
                      <div class="content-panel">
                          <h4></i>نمایش کالا فروخته شده</h4><hr><table class="table table-striped table-advance table-hover">
                              <thead>

                              <tr>
                                  <th>نام کالا</th>
                                  <th>کد</th>
                                  <th>دسته بندی</th>
                                  <th>برند</th>
                                  <th>قیمت</th>
                                  <th>تعداد فروش</th>
                                  <th>عکس</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              require('inc/connect.php');

                              $page=$_GET["pageid"];
                              $per_page =10;
                              $start = ($page-1)*$per_page;
                              $show_pages=("SELECT * FROM `basket`");
                              $resu=mysqli_query($sql,$show_pages);
                              $coun = mysqli_num_rows($resu);
                               $show_sproduct=("SELECT distinct(product.code),product.* FROM `product`,`basket` where product.id=basket.product_id and basket.sell=1 ORDER BY basket.id DESC limit $start,$per_page");
                                $result=mysqli_query($sql,$show_sproduct);
                                if(mysqli_num_rows($result) > 0){
                                for($i=1;$row=mysqli_fetch_assoc($result);$i++){
                                    $id=$row["id"];
                                echo'<form method="post" action="inc/dl-product.php" id="frm"   onSubmit="return dl()">
                                      <tr style="font-family:roya;">
                                      <td>'.$row["name"].'</td>
                                      <td>'.$row["code"].'</td>';
                                       //category product
                                       $categoryp="SELECT categoryp.name as categoryp FROM `categoryp`,`product` WHERE categoryp.id=product.categoryp and product.id='$id'";
                                       $re=mysqli_query($sql,$categoryp);
                                       $r=mysqli_fetch_assoc($re);
                                       //category brand
                                       $categoryb="SELECT categoryb.name as categoryb FROM `categoryb`,`product` WHERE categoryb.id=product.categoryb and product.id='$id'";
                                       $res=mysqli_query($sql,$categoryb);
                                       $ro=mysqli_fetch_assoc($res);
                                      echo '
                                      <td>'.$r["categoryp"].'</td>
                                      <td>'.$ro["categoryb"].'</td>
                                      <td>'.$row["price"].'</td>';
                                      //counter
                                       $counter="SELECT COUNT(product_id) as counter FROM basket WHERE basket.product_id='$id' AND basket.sell!=0";
                                       $r=mysqli_query($sql,$counter);
                                       if(mysqli_num_rows($r) >0){
                                       $ro=(mysqli_fetch_assoc($r));

                                       echo '<td>'.$ro["counter"].'</td>';
                                       }
                                       //end counter
                                       echo '<td><img src="../images/product_s/'.$row["id"].'.png" width="62" height="62" style="border-radius:8px;"/></td>
                                    </tr>
                                  </form>';
                                  }
                                }
                              ?>
                              </tbody>
                          </table>
                          <div style="align-items: center;direction: ltr;text-align: center;" class="general-pagination group">
                              <?php
                              $allpages = ceil($coun / $per_page);
                              for($i = 1 ; $i <= $allpages ; $i++){
                                  echo '<a style="margin-right:2px;" href="show-product.php?pageid='.$i.'"><span class="badge bg-warning">'.$i.'</span></a>';
                              }
                              ?>
                          </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->

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
