 
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>XP Market- محصول</title>
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

     require("inc/header.php");

     ?> 

    <!--  ==========  -->
    <!--  = Main container =  -->
    <!--  ==========  -->
    <div class="container">
        <div class="push-up top-equal blocks-spacer">
            
            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->
            <div class="row blocks-spacer">
                
                <!--  ==========  -->
                <!--  = Preview Images =  -->
                <!--  ==========  -->
                <?php
                $id=$_GET["productid"];
                echo '<div class="span5">
                    <div class="product-preview">
                        <div class="picture">
                            <img src="images/product/'.$id.'.png" alt="" width="940" height="940" id="mainPreviewImg" />
                        </div>
                        <div class="thumbs clearfix">
                            <div class="thumb active">
                                <a href="#mainPreviewImg"><img src="images/product/'.$id.'.png"  alt="" width="940" height="940" /></a>
                            </div>
                            <div class="thumb">
                                <a href="#mainPreviewImg"><img src="images/product/'.$id.'.png" alt="" width="940" height="940" /></a>
                            </div>
                            <div class="thumb">
                                <a href="#mainPreviewImg"><img src="images/product/'.$id.'.png" alt="" width="940" height="940" /></a>
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
                
                <!--  ==========  -->
                <!--  = Title and short desc =  -->
                <!--  ==========  -->
                <?php 
                require("inc/connect.php");
                $product="SELECT * FROM `product` WHERE id='$id'";
                $result=mysqli_query($sql,$product);
                if(mysqli_num_rows($result) >0){
                    $row=mysqli_fetch_assoc($result);
                echo'<div class="span7">
                    <div class="product-title">
                        <h1 class="name">'.$row["name"].'</h1>
                        <div class="meta">
                            <span class="tag">'.$row["price"].' هزار تومان</span>
                            <span class="stock">';
                            if($row["number"]!=0){
                              echo '<span class="btn btn-success">موجود</span>';
                              }else if($row["number"]==0){
                              echo '<span class="btn btn-danger">اتمام موجودی</span>
                                <span class="btn btn-warning">اگر موجود شد اطلاع بده</span>';
                            }

                        echo'</span>
                        </div>
                    </div>
                    <div class="product-description">
                        <p>لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بلکه شناخت این ابزار گاه اساسا بدون هدف بود و سئوالهای زیادی در گذشته بوجود می آید، تنها لازمه آن بود. </p>
                        <hr />';
                            }
                        ?>
                        <!--  ==========  -->
                        <!--  = Add to cart form =  -->
                        <!--  ==========  -->
                        <?php
                        $r=mysqli_fetch_assoc($result);
                        echo '<form action="inc/add_basket.php" method="post" class="form form-inline clearfix">
                            <div class="numbered">
                            	<input type="text" name="num" value="1" class="tiny-size" />
                            	<span class="clickable add-one icon-plus-sign-alt"></span>
                            	<span class="clickable remove-one icon-minus-sign-alt"></span>
                            </div>
                            &nbsp;';
                            if($row["number"]!=0){
                            echo'<button class="btn btn-success pull-right"><i class="icon-shopping-cart"></i> اضافه به سبد خرید</button>';
                            }else if($row["number"]==0){
                                echo'<button class="btn btn-danger pull-right"><i class="icon-shopping-cart"></i>موجود شد به من اطلاع بده</button>';
                            }
                        
                        echo'</form>';
                        ?>
                        <hr />
                        
                    </div>
                </div>
            </div>
            
            <!--  ==========  -->
            <!--  = Tabs with more info =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-1" data-toggle="tab">جزئیات</a>
                        </li>
                        <li>
                            <a href="#tab-2" data-toggle="tab">جدول اندازه</a>
                        </li>
                        <li>
                            <a href="#tab-3" data-toggle="tab">نظرات</a>
                        </li>
                        <li>
                            <a href="#tab-4" data-toggle="tab">جزئیات ارسال</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="fade in tab-pane active" id="tab-1">
                            <h3>توضیحات محصول</h3>
                            <p>لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بلکه شناخت این ابزار گاه اساسا بدون هدف بود و سئوالهای زیادی در گذشته بوجود می آید، تنها لازمه آن بود. </p>
                            <p>لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بل</p>
                            <h1>سرخط H1 30px</h1>
                            <h2>سرخط H2 26px</h2>
                            <h3>سرخط H3 20px</h3>
                            <h4>سرخط H4 18px</h4>
                            <h5>سرخط H5 15px</h5>
                            <p>لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. </p>
                        </div>
                        <div class="fade tab-pane" id="tab-2">
                            <p>
                                لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بلکه شناخت این ابزار گاه اساسا بدون هدف بود و سئوالهای زیادی در گذشته بوجود می آید، تنها لازمه آن بود.  
                            </p>
                        </div>
                        <div class="fade tab-pane" id="tab-3">
                            <p>
                                لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بلکه شناخت این ابزار گاه اساسا بدون هدف بود و سئوالهای زیادی در گذشته بوجود می آید، تنها لازمه آن بود.  
                            </p>
                        </div>
                        <div class="fade tab-pane" id="tab-4">
                            <p>
                                لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بلکه شناخت این ابزار گاه اساسا بدون هدف بود و سئوالهای زیادی در گذشته بوجود می آید، تنها لازمه آن بود...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
    
    <!--  ==========  -->
    <!--  = Related Products =  -->
    <!--  ==========  -->
    <div class="boxed-area no-bottom">
        <div class="container">
            
            <!--  ==========  -->
            <!--  = Title =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                    	<h2 class="title"><span class="light">محصولات</span> مرتبط</h2>
                    </div>
                </div>
            </div>
            
            <!--  ==========  -->
            <!--  = Related products =  -->
            <!--  ==========  -->
            <div class="row popup-products">
                    
                <!--  ==========  -->
                <!--  = Products =  -->
                <?php 
                $category=$_GET["categoryid"];
                $product="SELECT * FROM `product` where product.categoryp='$category' ORDER BY id DESC LIMIT 4";
                $result=mysqli_query($sql,$product);
                if(mysqli_num_rows($result) >0){
                while($row=mysqli_fetch_assoc($result)){
                echo '<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/product/'.$row["id"].'.png" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="product.php?productid='.$row["id"].'&categoryid='.$row["categoryp"].'" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                        <h3 class="title">'.$row["name"].'</h3>
						<h4 class="title">'.$row["price"].' تومان</h4>
                        <h5 class="no-margin">کد '.$row["code"].'</h5>
                        </div>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                        </p>
            	    </div>
            	</div>';
                       }
                    } 
                ?>
                <!-- /product -->
            	 
            	
            </div>
        </div>
    </div>
    
    <?php 
    require("inc/footer.php");
    ?>
     
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
      js.src = "";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    
    <!--  = jQuery - CDN with local fallback =  -->
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
    <!--  = Custom JS =  -->
    <script src="js/custom.js" type="text/javascript"></script>

  </body>
</html>

    
    