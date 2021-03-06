<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>XP Market - پیگیری کالا خریداری شده</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">

    <!--  Google Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,700,400italic,700italic&amp;subset=latin,latin-ext,greek' rel='stylesheet' type='text/css'>

    <!-- Twitter Bootstrap -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/responsive.css" rel="stylesheet">
    <!-- Slider Revolution -->
    <link rel="stylesheet" href="js/rs-plugin/css/settings.css" type="text/css"/>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css" type="text/css"/>
    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="js/prettyphoto/css/prettyPhoto.css" type="text/css"/>
    <!-- main styles -->

    <link href="stylesheets/main.css" rel="stylesheet">



    <!-- Modernizr -->
    <script src="js/modernizr.custom.56918.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch/144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch/114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch/72.png">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch/57.png">
    <link rel="shortcut icon" href="images/apple-touch/57.png">
  </head>


  <body class=" checkout-page">

    <div class="master-wrapper">



    <div class="container">
        <div class="row">

            <!--  ==========  -->
            <!--  = Main content =  -->
            <!--  ==========  -->
            <section class="span12">

                <div class="checkout-container">
                    <div class="row">
                    	<div class="span10 offset1">

                    	    <!--  ==========  -->
							<!--  = Header =  -->
							<!--  ==========  -->
                    		<header>
                    		    <div class="row">
                    		    	<div class="span2">
                    		    		<a href="index.php"><img src="images/xp-logo.png" alt="Xp market Logo" width="300" height="150"/></a>
                    		    	</div>
                                    <div class="span6">
                                        <div class="center-align">
                                            <h1>پیگیری کالا خریداری شده</h1>
                                        </div>
                                    </div>
                    		    </div>
                    		</header>
                            <hr>

                    		<!--  ==========  -->
							<!--  = Selected Items =  -->
							<!--  ==========  -->
							<table class="table table-items">
							    <thead>
							    	<tr>
                                        <th colspan="2">آیتم</th>
							    		<th><div class="align-right" style="margin-right: 35px">تعداد</div></th>
							    		<th><div class="align-right" style="margin-right: 25px">قیمت</div></th>
                                        <th><div class="align-right" style="margin-right: 10px">تاریخ خرید</div></th>
                                        <th><div class="align-right" style="margin-right: 10px">تاریخ دریافت</div></th>
							    	</tr>
							    </thead>
							    <tbody>
                                <?php
                                require ("inc/connect.php");
                                $id=$_SESSION["user_id"];
                                $show="SELECT distinct(code),product.*,basket.product_id,basket.user_id,basket.date from product,basket where product.id=basket.product_id AND basket.user_id='$id' AND basket.sell=1 ORDER BY basket.id desc ";
                                $result=mysqli_query($sql,$show);
                                if(mysqli_num_rows($result) >0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $p_id=$row["id"];
                                        echo '<tr>
							        	<td class="image"><img src="images/product_s/'.$row["id"].'.png" alt="" width="124" height="124" /></td>
							        	<td class="desc">'.$row["name"].'</td>
							        	<td class="qty">';
                                        $counter="SELECT COUNT(product_id) as counter FROM basket WHERE '$p_id'=basket.product_id AND basket.user_id='$id' AND basket.sell=1";
                                        $r=mysqli_query($sql,$counter);
                                        if(mysqli_num_rows($r) >0){
                                            $ro=(mysqli_fetch_assoc($r));
                                            echo'<input type="text" class="tiny-size" value="'.$ro["counter"].'" disabled="true"/>';
                                        }
					            	    echo'</td>
							        	<td class="price">
							        	   '.$row["price"].' T
							        	</td>
							        	<td class="price">
							        	   '.$row["date"].'
							        	</td>
							        	<td class="price">
							        	   '.$row["date"].'
							        	</td>
							           </tr>';
                                    }
                                }
                                ?>
							     <tr>
							        	<td colspan="4" rowspan="2">
							        	</td>
							        	<td class="stronger">هزینه ارسال :</td>
                        <?php
                        //sum product
                        $sum="SELECT sum(price) as 'sum' FROM `product`,basket WHERE product.id=basket.product_id and basket.user_id='$id' AND basket.sell=1";
                        $result2=mysqli_query($sql,$sum);
                        $row2= mysqli_fetch_assoc($result2);
                        //end sum

                        if($row2["sum"]<=500000) {
                            echo '<td class="stronger"><div class="align-right">20000 تومان</div></td>';
                        }else{
                            echo '<td class="stronger"><div class="align-right">رایگان</div></td>';
                        }
                        ?>
							        </tr>
							        <tr>
							        	<td class="stronger">جمع کل :</td>
                                       <?php
                                          //sum product
                                          $sum="SELECT sum(price) as 'sum' FROM `product`,basket WHERE product.id=basket.product_id and basket.user_id='$id' AND basket.sell=1";
                                          $result2=mysqli_query($sql,$sum);
                                          $row2= mysqli_fetch_assoc($result2);
                                          //end sum
							        	  echo '<td class="stronger"><div class="size-16 align-right">'.$row2["sum"].' تومان </div></td>';
	                                ?>
							        </tr>
							    </tbody>
							</table>

							<hr />
                    	</div>
                    </div>
                </div>


            </section> <!-- /main content -->

        </div>
    </div> <!-- /container -->




    </div> <!-- end of master-wrapper -->



    <!--  ==========  -->
    <!--  = JavaScript =  -->
    <!--  ==========  -->

    <!--  = FB =  -->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=126780447403102";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


    <!--  = jQuery - CDN with local fallback =  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write('<script src="js/jquery.min.js"><\/script>');
    }
    </script>

    <!--  = _ =  -->
    <script src="js/underscore/underscore-min.js" type="text/javascript"></script>

    <!--  = Bootstrap =  -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <!--  = Slider Revolution =  -->
    <script src="js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

    <!--  = CarouFredSel =  -->
    <script src="js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>

    <!--  = jQuery UI =  -->
    <script src="js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.10.3/touch-fix.min.js" type="text/javascript"></script>

    <!--  = Isotope =  -->
    <script src="js/isotope/jquery.isotope.min.js" type="text/javascript"></script>

    <!--  = Tour =  -->
    <script src="js/bootstrap-tour/build/js/bootstrap-tour.min.js" type="text/javascript"></script>

    <!--  = PrettyPhoto =  -->
    <script src="js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

    <!--  = Google Maps API =  -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/goMap/js/jquery.gomap-1.3.2.min.js"></script>

    <!--  = Custom JS =  -->
    <script src="js/custom.js" type="text/javascript"></script>

  </body>
</html>
