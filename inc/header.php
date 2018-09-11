<?php
error_reporting(0);
session_start();
$_SESSION["user"];
?>
<script>
    function validateLoginForm(){
        var username = document.forms["LoginForm"]["inputEmail"].value;
        var password = document.forms["LoginForm"]["inputPassword"].value;
        var captcha = document.forms["LoginForm"]["captcha"].value;
        if (username == null || username == ""){
            document.getElementById('inputEmail').style="border:1px solid #D40000";
            document.getElementById('inputEmail').placeholder="لطفا ایمیل را وارد کنید";
            return false;
        }else if (password == null || password == ""){
            document.getElementById('inputPassword').style="border:1px solid #D40000";
            document.getElementById('inputPassword').placeholder="لطفا پسورد را وارد کنید";
            return false;
        }else if(password.length<8){
            document.getElementById('inputPassword').style="border:1px solid #D40000";
            document.getElementById('inputPassword').placeholder="پسورد باید 8 رقمی باشد";
            return false;
        }else if (captcha == null || captcha == ""){
            document.getElementById('captcha').style="border:1px solid #D40000;margin-top:10px;width:169px";
            document.getElementById('captcha').placeholder="کپتچا را وارد کنید";
            return false;
        }
        return true
    }

    function CheckEmptyLogin(){
        var username=document.getElementById('inputEmail').value;
        var password=document.getElementById('inputPassword').value;
        var captcha=document.getElementById('captcha').value;
        if(username === ''){
            document.getElementById('inputEmail').style="border:1px solid #D40000";
            document.getElementById('inputEmail').placeholder="لطفا ایمیل را وارد کنید";
            return false;
        }
        else{
            document.getElementById('inputEmail').style="";
        }
        if(password === ''){
            document.getElementById('inputPassword').style="border:1px solid #D40000";
            document.getElementById('inputPassword').placeholder="لطفا پسورد  را وارد کنید";
            return false;
        }
        else{
            document.getElementById('inputPassword').style="";
        }
        if(captcha === ''){
            document.getElementById('captcha').style="border:1px solid #D40000;margin-top:10px;width:169px";
            document.getElementById('captcha').placeholder="کپتچا را وارد کنید";
            return false;
        }
        else{
            document.getElementById('captcha').style="margin-top:10px;width:169px";
        }
        return true;
    }

    function validateRegisterForm(){
        var username = document.forms["RegisterForm"]["inputUsernameRegister"].value;
        var password = document.forms["RegisterForm"]["inputPasswordRegister"].value;
        var captcha = document.forms["RegisterForm"]["captcha2"].value;
        if (username == null || username == ""){
            document.getElementById('inputUsernameRegister').style="border:1px solid #D40000";
            document.getElementById('inputUsernameRegister').placeholder="لطفا ایمیل را وارد کنید";
            return false;
        }else if (password == null || password == ""){
            document.getElementById('inputPasswordRegister').style="border:1px solid #D40000";
            document.getElementById('inputPasswordRegister').placeholder="لطفا پسورد را وارد کنید";
            return false;
        }else if (captcha == null || captcha == ""){
            document.getElementById('captcha2').style="border:1px solid #D40000;margin-top:10px;width:169px";
            document.getElementById('captcha2').placeholder="لطفا کپتچا را وارد کنید";
            return false;
        }
        return true
    }

    function CheckEmptyRegister(){
        var username=document.getElementById('inputUsernameRegister').value;
        var password=document.getElementById('inputPasswordRegister').value;
        var captcha=document.getElementById('captcha2').value;
        if(username === ''){
            document.getElementById('inputUsernameRegister').style="border:1px solid #D40000";
            document.getElementById('inputUsernameRegister').placeholder="لطفا ایمیل را وارد کنید";
            return false;
        }
        else{
            document.getElementById('inputUsernameRegister').style="";
        }
        if(password === ''){
            document.getElementById('inputPasswordRegister').style="border:1px solid #D40000";
            document.getElementById('inputPasswordRegister').placeholder="لطفا پسورد را وارد کنید";
            return false;
        }
        else{
            document.getElementById('inputPasswordRegister').style="";
        }
        if(captcha === ''){
            document.getElementById('captcha2').style="border:1px solid #D40000;margin-top:10px;width:169px";
            document.getElementById('captcha2').placeholder="لطفا کپتچا را وارد کنید";
            return false;
        }
        else{
            document.getElementById('captcha2').style="margin-top:10px;width:169px";
        }
        return true;
    }
</script>
    <!--  ==========  -->
    <!--  = Header =  -->
    <!--  ==========  -->
    <header id="header">
        <div class="container">
            <div class="row">

                <!--  ==========  -->
                <!--  = Logo =  -->
                <!--  ==========  -->
                <div class="span7">
                    <a href="index.php">
                    <img src="images/xp-logo.png" width="300" height="100" style="padding: 20px 0;"/>
                    </a>

                </div>

                <!--  ==========  -->
                <!--  = Social Icons =  -->
                <!--  ==========  -->
                <div class="span5">
                    <div class="topmost-line">
                        </div>
                    <div class="top-right">
                        <div class="register">
						    <?php
                            if($_SESSION["user"]==false) {
                             echo   '<a href="#loginModal" role="button" data-toggle="modal"><button class="btn btn-success btn-large push-down-10">ورود</button></a>
                                    <a href="#registerModal" role="button" data-toggle="modal"><button class="btn btn-success btn-large push-down-10">ثبت نام</button></a>';
                            }else if($_SESSION["user"]==true){
                              echo   '<span><b>'.$_SESSION["user_name"].' خوش آمدید</b></span>&nbsp;&nbsp;&nbsp;
                                      <a href="inc/exit.php" role="button" data-toggle="modal"><button class="btn btn-danger btn-large push-down-10">خروج</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div> <!-- /social icons -->
            </div>
        </div>
    </header>

    <!--  ==========  -->
    <!--  = Main Menu / navbar =  -->
    <!--  ==========  -->
    <div class="navbar navbar-static-top" id="stickyNavbar">
      <div class="navbar-inner">
        <div class="container">
          <div class="row">
            <div class="span9">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>

                <!--  ==========  -->
                <!--  = Menu =  -->
                <!--  ==========  -->
                <div class="nav-collapse collapse">
                  <ul class="nav" id="mainNavigation">
                    <li class="dropdown">
                        <a href="index.php" class="dropdown-toggle"> خانه </a>
                    </li>

                    <li class="dropdown">
                        <a href="shop.php?pageid=1" class="dropdown-toggle"> فروشگاه</a>
                    </li>
                    <li class="dropdown">
                        <a href="blog.php?pageid=1" class="dropdown-toggle">اخبار</a>
                    </li>
                    <li class="dropdown">
                        <a href="about-us.php" class="dropdown-toggle">درباره ما</a>

                    </li>

                    <li class="dropdown">
                        <a href="contact.php" class="dropdown-toggle">تماس با ما</a>

                    </li>

                  </ul>

                  <!--  ==========  -->
                  <!--  = Search form =  -->
                  <!--  ==========  -->
                  <form class="navbar-form pull-right" action="shop_search.php" method="get">
                      <button type="submit"><span class="icon-search"></span></button>
                      <input type="text" class="span1" name="search" id="navSearchInput">
                  </form>
                </div><!-- /.nav-collapse -->
            </div>

            <!--  ==========  -->
            <!--  = Cart =  -->
            <!--  ==========  -->
              <?php
              if($_SESSION["user"]==true) {
                  require ("connect.php");
                  //for counter
                  session_start();
                  $id=$_SESSION["user_id"];
                  $result=mysqli_query($sql,"select count(id) as 'count' from `basket` where basket.user_id='$id'AND basket.sell!=1");
                  $row= mysqli_fetch_assoc($result);
                  //end counter

                  //sum product
                  $sum="SELECT sum(price) as 'sum' FROM `product`,basket WHERE product.id=basket.product_id and basket.user_id='$id'AND basket.sell!=1";
                  $result2=mysqli_query($sql,$sum);
                  $row2= mysqli_fetch_assoc($result2);
                  //end sum
                  echo '<div class="span3">
                <div class="cart-container" id="cartContainer">
                    <div class="cart">
                        <p class="items">سبد خرید <span class="dark-clr">('.$row["count"].')</span></p>';
                            if($row2["sum"]!=0 || $row2["sum"]!=NULL){
                            echo '<p class="dark-clr hidden-tablet">'.$row2["sum"].' T</p>
                                  <a href="checkout-step-1.php" class="btn btn-danger">';
                          }else {
                                echo '<p class="dark-clr hidden-tablet">0 T</p>
                                      <a href="#" class="btn btn-danger">';
                            }
                            echo '<!-- <span class="icon icons-cart"></span> -->
                            <i class="icon-shopping-cart"></i>';
                          //sum product
                          $sell_counter="SELECT count(id) as 'counter' FROM basket WHERE  basket.user_id='$id' AND basket.sell=1";
                          $result3=mysqli_query($sql,$sell_counter);
                          $row3= mysqli_fetch_assoc($result3);
                          //end sum
                            if($row3["counter"]!=0) {
                              echo '<a href = "receipts.php" class="btn btn-danger" style = "margin-right: 5px;" >
                                    <i class="icon-money" ></i >';
                                }else{

                            }
                    echo'</a>
                    </div>
                    <div class="open-panel">';
                  //for show
                  $show="SELECT distinct(code),product.*,basket.product_id,basket.user_id from product,basket where product.id=basket.product_id AND basket.user_id='$id' AND basket.sell!=1";
                  $result=mysqli_query($sql,$show);
                  if(mysqli_num_rows($result) >0){
                  while($row = mysqli_fetch_assoc($result)){
                      $p_id=$row["id"];
                  //end show
                        echo'<div class="item-in-cart clearfix">
                            <div class="image">
                                <img src="images/product_s/'.$row["id"].'.png" width="124" height="124" alt="cart item" />
                            </div>
                            <div class="desc">
                                <strong><a href="product.php?productid='.$row["id"].'&categoryid='.$row["categoryp"].'">'.$row["name"].'</a></strong>
                                <span class="light-clr qty">';
                                $counter="SELECT COUNT(product_id) as counter FROM basket WHERE '$p_id'=basket.product_id AND basket.user_id='$id' AND basket.sell!=1";
                                $r=mysqli_query($sql,$counter);
                                if(mysqli_num_rows($r) >0){
                                $ro=(mysqli_fetch_assoc($r));
                                 echo 'تعداد :  '.$ro["counter"].'  ';
                                }
                                echo'<a href="#" class="icon-remove-sign" title="Remove Item"></a>
                                </span>
                            </div>
                            <div class="price">
                                <strong>T'.$row["price"].'</strong>
                            </div>
                        </div>';
                        }
                        }
                  else {
                      echo '<div class="alert in fade" >
                            <p style="text-align:center;direction:rtl;">سبد خرید شما خالی است</p>
                            </div>';
                  }
                        echo'<div class="summary">
                            <div class="line">
                                <div class="row-fluid">';
                                  if($row2["sum"]<=500000) {
                                      echo '<div class="span6 align-right">20000 تومان</div>';
                                  }else{
                                      echo '<div class="span6 align-right">رایگان</div>';
                                  }
                                    echo'<div class="span6">هزینه ارسال :</div>
                                </div>
                            </div>
                            <div class="line">
                                <div class="row-fluid">';
                                if($row2["sum"]!=0 || $row2["sum"]!=NULL){
                                 echo'<div class="span6 align-right size-16">' . $row2["sum"] . '  تومان </div>';
                               }else{
                                 echo'<div class="span6 align-right size-16">0 تومان</div>';
                               }
                                 echo'<div class="span6">جمع کل :</div>
                                </div>
                            </div>
                        </div>
                        <div class="proceed">';
                        if($row2["sum"]!=0 || $row2["sum"]!=NULL) {
                         echo'<a href="checkout-step-1.php" class="btn btn-danger pull-right bold higher" > تصویه حساب <i class="icon-shopping-cart"></i></a>';
                            }else{
                         echo'<a href="#" class="btn btn-danger pull-right bold higher" > تصویه حساب <i class="icon-shopping-cart"></i></a>';
                            }
                        echo '<small>هزینه ارسال بر اساس منطقه جغرافیایی محاسبه میشود. <a href="#">اطلاعات بیشتر</a></small>
                        </div>
                    </div>
                </div>
            </div> <!-- /cart -->';
              }
              ?>
              <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="loginModalLabel"><span class="light">ورود</span> به XP Market</h3>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="inc/login_user.php" name="LoginForm" onsubmit="return validateLoginForm();">
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputEmail">نام کاربری</label>
                              <div class="controls">
                                  <input type="email" onblur="CheckEmptyLogin();" class="input-block-level" id="inputEmail" name="inputEmail" placeholder="Email">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputPassword">رمز عبور</label>
                              <div class="controls">
                                  <input type="password" onblur="CheckEmptyLogin();" class="input-block-level" id="inputPassword" name="inputPassword" placeholder="Password">
                              </div>
                          </div>
                          <div class="control-group">
                              <div class="col-sm-10" >
                              <?php
                                  $sa_captchaDIR = "admin/assets/sc/sa-captcha";
                                  require("admin/assets/sc/sa-captcha/captcha.php");
                              ?>
                              <input id="captcha" name="captcha" onblur="CheckEmptyLogin();" style="margin-top:10px;width:169px" class="form-control round-form" type="text" placeholder="کد امنیتی">
                              </div>
                          </div>
                          <div class="control-group">
                              <div class="controls">
                                  <label class="checkbox">
                                      <input type="checkbox">
                                      مرا به خاطر بسپار
                                  </label>
                              </div>
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary input-block-level bold higher">
                              ورود
                          </button>
                      </form>
                      <p class="center-align push-down-0">
                          <a href="#" data-dismiss="modal">رمز عبورتان را فراموش کرده اید؟</a>
                      </p>
                  </div>
              </div>

              <!--  = Register =  -->
              <div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="registerModalLabel"><span class="light">عضویت</span> به XP Market</h3>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="inc/register.php" name="RegisterForm" onsubmit="return validateRegisterForm();">
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputUsernameRegister">نام کاربری</label>
                              <div class="controls">
                                  <input type="email" class="input-block-level" onblur="CheckEmptyRegister();" id="inputUsernameRegister" name="inputUsernameRegister" placeholder="Email">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputPasswordRegister">رمز عبور</label>
                              <div class="controls">
                                  <input type="password" class="input-block-level" onblur="CheckEmptyRegister();" id="inputPasswordRegister" name="inputPasswordRegister" placeholder="Password">
                              </div>
                          </div>
                          <div class="control-group">
                              <div class="col-sm-10" >
                                  <?php
                                  $sa_captcha="admin/assets/sc/sa-captcha";
                                  require("admin/assets/sc/sa-captcha/captcha.php");
                                  ?>
                                  <input id="captcha2" name="captcha2" onblur="CheckEmptyRegister();" style="margin-top:10px;width:169px" class="form-control round-form" type="text" placeholder="کد امنیتی">
                              </div>
                          </div>
                          <button type="submit" name="submit" class="btn btn-danger input-block-level bold higher">
                              عضویت
                          </button>
                      </form>
                      <p class="center-align push-down-0">
                          <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">قبلا ثبت نام کرده اید؟</a>
                      </p>

                  </div>
              </div>
          </div>
        </div>
      </div>
    </div> <!-- /main menu -->
