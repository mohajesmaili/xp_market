
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>XP Market - جستجو کالا</title>
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


  <body class="">

    <div class="master-wrapper">
        <?php
        require ("inc/header.php");
        ?>
    <!--  ==========  -->
    <!--  = Breadcrumbs =  -->
    <!--  ==========  -->

    <div class="container">
        <div class="push-up">
            <div class="row">

                <!--  ==========  -->
                <!--  = Sidebar =  -->
                <!--  ==========  -->
                <aside class="span3 left-sidebar">
                    <div class="sidebar-item sidebar-filters" id="sidebarFilters">

                        <!--  ==========  -->
                        <!--  = Sidebar Title =  -->
                        <!--  ==========  -->
                        <div class="underlined">
                        	<h3><span class="light">بر اساس فیلتر</span> خرید کنید</h3>
                        </div>
                        <!--  ==========  -->
                        <!--  = Prices slider =  -->
                        <!--  ==========  -->
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" href="#filterPrices">قیمت <b class="caret"></b></a>
                            </div>
                            <div id="filterPrices" class="accordion-body in collapse">
                                <div class="accordion-inner with-slider">
                                    <div class="jqueryui-slider-container">
                                        <div id="pricesRange"></div>
                                    </div>
                                    <input type="text" data-initial="4329" class="max-val pull-right" disabled />
                                    <input type="text" data-initial="99" class="min-val" disabled />
                                </div>
                            </div>
                        </div> <!-- /prices slider -->
                        <!--  ==========  -->
                        <!--  = Brand filter =  -->
                        <!--  ==========  -->
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterFour">برند <b class="caret"></b></a>
                            </div>
                            <div id="filterFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <?php
                                    $categoryb="SELECT * FROM `categoryb`";
                                    $result2=mysqli_query($sql,$categoryb);
                                    if(mysqli_num_rows($result2)>0){

                                    while($row2=mysqli_fetch_assoc($result2)){
                                    echo '<a href="#" data-target="'.$row2["id"].'" data-type="brand" class="selectable detailed"><i class="box"></i>'.$row2["name"].'</a>';
                                            }
                                        }
                                    ?>

                                </div>
                            </div>
                        </div> <!-- /brand filter -->

                        <a href="#" class="remove-filter" id="removeFilters"><span class="icon-ban-circle"></span> حذف همه فیلتر ها</a>

                    </div>
                </aside> <!-- /sidebar -->

                <!--  ==========  -->
                <!--  = Main content =  -->
                <!--  ==========  -->
                <section class="span9 blocks-spacer">

                    <!--  ==========  -->
                    <!--  = Title =  -->
                    <!--  ==========  -->
                    <div class="underlined push-down-20">
                        <div class="row">
                            <div class="span5">
                                <?php
                                $search=$_GET["search"];
                                if($search==""){
                                    echo"<script>
                                           alert('فیلد را پر کنید');
                                           window.location.href='shop.php?pageid=1';
                                         </script>";
                                }else {
                                    echo '<h3><span class="light">جستجو:</span> &quot;' . $search . '&quot;</h3>';
                                }
                                ?>
                            </div>
                            <div class="span4">
                                <div class="form-inline sorting-by">
                                    <label for="isotopeSorting" class="black-clr">چینش:</label>
                                    <select id="isotopeSorting" class="span3">
                                        <option value='{"sortBy":"price", "sortAscending":"true"}'>بر اساس قیمت (کم به زیاد) &uarr;</option>
                                        <option value='{"sortBy":"price", "sortAscending":"false"}'>بر اساس قیمت (زیاد به کم) &darr;</option>
                                        <option value='{"sortBy":"name", "sortAscending":"true"}'>بر اساس نام (صعودی) &uarr;</option>
                                        <option value='{"sortBy":"name", "sortAscending":"false"}'>بر اساس نام (نزولی) &darr;</option>
                                        <option value='{"sortBy":"popularity", "sortAscending":"true"}'>بر اساس محبوبیت (کم به زیاد) &uarr;</option>
                                        <option value='{"sortBy":"popularity", "sortAscending":"false"}'>بر اساس محبوبیت (زیاد به کم) &darr;</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /title -->

                    <!--  ==========  -->
                    <!--  = Products =  -->
                    <!--  ==========  -->
                    <div class="row popup-products">
                        <div id="isotopeContainer" class="isotope-container">
                	        <!--  ==========  -->
                            <!--  =Product =  -->
                            <!--  ==========  -->
                            <?php
                            require ("inc/connect.php");
                            $search_query="SELECT * FROM `product` where name like '%$search%'";
                            $result=mysqli_query($sql,$search_query);
                            if(mysqli_num_rows($result)>0) {
                                while($row=mysqli_fetch_assoc($result)){
                                echo '<div class="span3 filter--'.$row["categoryp"].'" data-price="'.$row["price"].'" data-popularity="2" data-brand="'.$row["categoryb"].'">
                    	         <div class="product">';
                    	            if($row["number"]!=0){
                	               echo'<div class="stamp green">موجود</div>';
            	                     }else if($row["number"]==0){
                                    echo'<div class="stamp red">تمام شد</div>';
                                     }
                    	            echo '<div class="product-img">
                    	                <div class="picture">
                    	                    <img width="540" height="374" alt="" src="images/product/'.$row["id"].'.png" />
                    	                    <div class="img-overlay">
                    	                        <a class="btn more btn-primary" href="product.php?productid='.$row["id"].'&categoryid='.$row["categoryp"].'">توضیحات بیشتر</a>';
                                                if($_SESSION["user"]==true) {
                                                    if($row["number"]!=0){
                                                        echo'<a class="btn buy btn-danger" href = "inc/add_basket.php?product_id='. $row["id"] .'" > اضافه به سبد خرید </a >';
                                                    }else if($row["number"]==0){
                                                        echo'<a class="btn buy btn-danger">موجود نیست</a>';
                                                    }
                                                }
                    	                echo '</div>
                    	                </div>
                    	            </div>
                    	            <div class="main-titles no-margin">
                    	                <h4 class="title">'.$row["name"].'</h4>
                    	                <h5 class="no-margin isotope--title">'.$row["price"].' تومان</h5>
                    	            </div>
                    	            <p class="center-align stars">
                    	                <span class="icon-star stars-clr"></span>
                    	                <span class="icon-star stars-clr"></span>
                    	                <span class="icon-star stars-clr"></span>
                    	                <span class="icon-star stars-clr"></span>
                    	                <span class="icon-star stars-clr"></span>

                    	            </p>
                    	        </div>
                    	    </div>';
                            }
                            }else{
                                echo"<script>
                                     alert('چنین کالایی وجود ندارد');
                                     window.location.href='shop.php?pageid=1';
                                     </script>";

                            }
                    	     ?><!-- /product -->


                    	</div>
                	</div>
                	<hr />
                </section> <!-- /main content -->
            </div>
        </div>
    </div> <!-- /container -->




    <!--  ==========  -->
    <!--  = Footer =  -->
    <!--  ==========  -->
        <?php
        require ("inc/footer.php");
        ?>
    <!--  ==========  -->
    <!--  = Modal Windows =  -->
    <!--  ==========  -->

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
