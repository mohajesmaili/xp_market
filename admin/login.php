<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>XP-Market | ورود ادمین</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function validateForm(){
var us = document.forms["form"]["us"].value;
var pw = document.forms["form"]["pw"].value;
if (us == null || us == ""){
    document.getElementById('us').style="border:1px solid #D40000";
  return false;
  }
else if (pw == null || pw == ""){
  document.getElementById('pw').style="border:1px solid #D40000";
  return false;
  }
  return true
}

function CheckEmpty(){
  us=document.getElementById('us').value;
  pw=document.getElementById('pw').value;
    if(us === ''){
        document.getElementById('us').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('us').style="";
    }
    if(pw === ''){
        document.getElementById('pw').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('pw').style="";
    }

    return true;
}
</script>
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" method="post" action="inc/login.php" name="form" onsubmit="return validateForm();">
		        <h2 class="form-login-heading" style="padding:20px;"><img style="width:200px" class="form-login-heading" src="../Images/xp-logo.png"/></h2>
		        <div class="login-wrap">
		            <input type="text" id="us" name="us" class="form-control" placeholder="نام کاربری" autofocus onblur="CheckEmpty();">
		            <br>
		            <input type="password" id="pw" name="pw" autocomplete="off" class="form-control" placeholder="پسورد" onblur="CheckEmpty();">
		            <label class="checkbox">
		                <span class="pull-right" style="float: right;">
		                    <a data-toggle="modal" href="login.php#myModal">پسورد خود را فراموش کرده اید؟</a>

		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> ورود</button>
		           </div>

		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">پسورد خود را فراموش کرده اید؟</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>لطفا ایمیل خود را وارد کنید.</p>
		                          <input type="email" name="email" placeholder="ایمیل" autocomplete="off" class="form-control placeholder-no-fix">

		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">برگشت</button>
		                          <button class="btn btn-theme" type="button" type="submit" >ارسال</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->

		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
