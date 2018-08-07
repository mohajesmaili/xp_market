<?php
error_reporting(0);
session_start();
$_SESSION["user"];
?>
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
                        <div class="lang-currency">
                            <div class="dropdown js-selectable-dropdown">
                                <a data-toggle="dropdown" class="selected" href="#"><span class="js-change-text"><i class="famfamfam-flag-ir"></i> فارسی (FA)</span> <b class="caret"></b></a>
                                <!-- for all available country flags look the styles in lib/components/_flags.scss -->
                                <ul class="dropdown-menu js-possibilities" role="menu" aria-labelledby="dLabel">
                                    <li><a href="#"><i class="famfamfam-flag-ir"></i> فارسی (FA)</a></li>
                                    <li><a href="#"><i class="famfamfam-flag-gb"></i> انگلیسی (EN)</a></li>
                                </ul>
                            </div>
                            <div class="dropdown js-selectable-dropdown">
                                <a data-toggle="dropdown" class="selected" href="#"><span class="js-change-text">RIAL (R)</span> <b class="caret"></b></a>
                                <ul class="dropdown-menu js-possibilities" role="menu" aria-labelledby="dLabel">
                                    <li><a href="#">RIAL (R)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-right">
                        <div class="register">
						    <?php
                            if($_SESSION["user"]==false) {
                             echo   '<a href="#loginModal" role="button" data-toggle="modal"><button class="btn btn-success btn-large push-down-10">ورود</button></a>
                                    <a href="#registerModal" role="button" data-toggle="modal"><button class="btn btn-success btn-large push-down-10">ثبت نام</button></a>';
                            }else if($_SESSION["user"]==true){
                              echo   '<a href="inc/exit.php" role="button" data-toggle="modal"><button class="btn btn-danger btn-large push-down-10">خروج</button></a>';
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
                        <p class="items">سبد خرید <span class="dark-clr">('.$row["count"].')</span></p>
                            <p class="dark-clr hidden-tablet">'.$row2["sum"].' T</p>
                            <a href="checkout-step-1.php" class="btn btn-danger">
                            <!-- <span class="icon icons-cart"></span> -->
                            <i class="icon-shopping-cart"></i>
                        </a>
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
                                <strong>'.$row["price"].'</strong>
                            </div>
                        </div>';
                        }
                        }
                  else {
                      echo '<p>کالا وجود ندارد</p>';
                  }
                        echo'<div class="summary">
                            <div class="line">
                                <div class="row-fluid">
                                    <div class="span6 align-right">20000 تومان</div>
                                    <div class="span6">هزینه ارسال :</div>      
                                </div>
                            </div>
                            <div class="line">
                                <div class="row-fluid">
                                 <div class="span6 align-right size-16">' . $row2["sum"] . '  تومان </div>
                                  <div class="span6">جمع کل :</div>
                                </div>
                            </div>
                        </div>
                        <div class="proceed">
                            <a href="checkout-step-1.php" class="btn btn-danger pull-right bold higher">تصویه حساب <i class="icon-shopping-cart"></i></a>
                            <small>هزینه ارسال بر اساس منطقه جغرافیایی محاسبه میشود. <a href="#">اطلاعات بیشتر</a></small>
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
                      <form method="post" action="inc/login_user.php">
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputEmail">نام کاربری</label>
                              <div class="controls">
                                  <input type="text" class="input-block-level" id="inputEmail" name="inputEmail" placeholder="Username">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputPassword">رمز عبور</label>
                              <div class="controls">
                                  <input type="password" class="input-block-level" id="inputPassword" name="inputPassword" placeholder="Password">
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
                      <form method="post" action="inc/register.php">
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputUsernameRegister">نام کاربری</label>
                              <div class="controls">
                                  <input type="text" class="input-block-level" id="inputUsernameRegister" name="inputUsernameRegister" placeholder="Username">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label hidden shown-ie8" for="inputPasswordRegister">رمز عبور</label>
                              <div class="controls">
                                  <input type="password" class="input-block-level" id="inputPasswordRegister" name="inputPasswordRegister" placeholder="Password">
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