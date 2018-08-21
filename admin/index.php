<?php
error_reporting(0);
session_start();
$_SESSION['login'];
if(!$_SESSION['login']){
  echo "<script>document.location.href='login.php'</script>";
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

    <title>XP_Market | داشبورد</title>

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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
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
                      <a class="active" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>داشبورد</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-shopping-cart"></i>
                          <span>کالا</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-product.php?pageid=1">نمایش کالا</a></li>
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

              <div class="row">
                  <div class="col-lg-9 main-chart">

                  <div class="row mtbox">
                  		<a href="contact.php?pageid=1">
                      <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
                            <span class="li_bubble"></span>
                            <h3>نظرات</h3>
                  			</div>
                  		</div>
                      </a>
                      <a href="show-user.php">
                          <div class="col-md-2 col-sm-2 box0">
                              <div class="box1">
                                  <span class="li_user"></span>
                                  <h3>کاربران</h3>
                              </div>
                          </div>
                      </a>
                      <a href="show-news.php?pageid=1">
                          <div class="col-md-2 col-sm-2 box0">
                              <div class="box1">
                                  <span class="li_news"></span>
                                  <h3>اخبار</h3>
                              </div>
                          </div>
                      </a>
                      <a href="show-categoryb.php?pageid=1">
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_photo"></span>
                          <h3>برند</h3>
                        </div>
                      </div>
                      </a>
                  		<a href="show-product.php?pageid=1">
                      <div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                          <span class="li_shop"></span>
                          <h3>کالا</h3>
                        </div>
                  		</div>
                      </a>

                  	</div><!-- /row mt -->

					<div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="border-head">
                          <h3>بازدید کنندگان</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>3.500</span></li>
                              <li><span>2.500</span></li>
                              <li><span>2.000</span></li>
                              <li><span>1.500</span></li>
                              <li><span>1.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">فروردین</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">اردیبهشت</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">خرداد</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">تیر</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">مرداد</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">شهریور</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">مهر</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar">
                              <div class="title">آبان</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar">
                              <div class="title">آذر</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar">
                              <div class="title">دی</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar">
                              <div class="title">بهمن</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar">
                              <div class="title">اسفند</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
					</div><!-- /row -->

                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						        <h3>ادمین ها</h3>
                    <?php
                      require('inc/connect.php');
                      $show_admin=("SELECT * FROM `admin`");
                      $result=mysqli_query($sql,$show_admin);
                      if(mysqli_num_rows($result) > 0){
                      while($row=mysqli_fetch_assoc($result)){
                      echo'<div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/admin/'.$row["id"].'.jpg" width="45px" height="45px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="show-user.php">'.$row["name"].'</a><br/>
                      		   <muted>'.$row["level"].'</muted>
                      		</p>
                      	</div>
                      </div>';
                      }
                      }
                      ?>
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->

                  </div><!-- /col-lg-3 -->
              </div>
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
