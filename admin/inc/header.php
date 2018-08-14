<script>
function exit()
{
a=confirm('آیا خارج میشوید؟');
if(a==true){
    document.location.href="inc/exit.php";
    return true
}else{
return false
}
}
</script>
<!--header start-->
      <header class="header black-bg">
            <!--logo start-->
            <a href="index.php" class="logo"><img style="width:150px;margin-top:-5px;"  src="../images/xp-logo.png"/></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.php#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.php#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.php#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.php#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.php#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.php#">
                            <i class="fa fa-envelope-o"></i>
                            <?php
                            require('connect.php');
                            $count_contact=("SELECT count(id) as id FROM `contact`");
                            $result=mysqli_query($sql,$count_contact);
                            if(mysqli_num_rows($result) > 0){
                            $l=mysqli_fetch_assoc($result);
                             echo
                            '<span class="badge bg-theme">'.$l["id"].'</span>
                             </a>
                             <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                              <p class="green">شما '.$l["id"].' پیام جدید دارید</p>';
                            }
                            ?>
                            </li>
                            <?php
                            $contact=("SELECT * FROM `contact`");
                            $result=mysqli_query($sql,$contact);
                            if(mysqli_num_rows($result) > 0){
                            while($row=mysqli_fetch_assoc($result)){
                            echo'<li>
                                <a href="contact.php">
                                    <span class="photo"><img alt="avatar" src="../images/dummy/avatars/avatar-1.jpg"></span>
                                    <span class="subject">
                                    <span class="from">'.$row["name"].'</span>
                                    <span class="time">23 دقیقه قبل</span>
                                    </span>
                                    <span class="message">
                                        '.$row["email"].'
                                    </span>
                                </a>
                            </li>';
                                 }
                              }
                            ?>
                            <li>
                                <a href="contact.php">نمایش تمامی پیام ها</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li style="cursor: pointer;"><a style="margin-left:15px;" onclick="exit()" class="logout">خروج</a></li>
                    <li style="cursor: pointer;"><a href="../index.php" class="logout">صفحه اصلی</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
