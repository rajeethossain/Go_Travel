<?php
session_start();
$access = $_SESSION['access'];
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/css.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">

      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer">
              <div class="rd-navbar-aside">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!--Brand--><a class="brand" href="index.html"><img src="images/logo-default-450x37.png" alt="" width="225" height="18"/></a>
                  </div>
                </div>
                <div class="rd-navbar-aside-right rd-navbar-collapse">
                  <ul class="rd-navbar-corporate-contacts">
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                        <div class="unit-body">
                          <p>09:00<span>am</span> — 05:00<span>pm</span></p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                        <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                      </div>
                    </li>
                  </ul><a class="button button-md button-default-outline-2 button-ujarak" href="#">Get a Free Quote</a>
                  <a class="button button-md button-default-outline-2 button-ujarak" href="logout.php">Sign Out</a>
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <div class="rd-navbar-nav-wrap">
                  <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                  </ul>
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">About</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Contact Us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <?php


        require_once('db_connect.php');
      	$connect = mysqli_connect( HOST, USER, PASS, DB )
      		or die("Can not connect");
      ?>

<!--------------------------------------------------------------------------------------------------------------------------------------->

              <h2 class="title"> Guide List </h2>

                  <table id="ptable">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>City</th>
                              <th>Contact no.</th>
                              <th>Email</th>
                              <th>NID</th>
                              <th>Joining Date</th>
                              <?php
                              if($access == 'admin'){
                                  ?>
                                  <th>Address</th>
                                  <th>Bank Account</th>
                                  <th>PV</th>
                                  <?php
                              }
                              ?>
                              <th>Action</th>


                          </tr>
                      </thead>
                      <tbody>

                        <?php

                          $returnobj = mysqli_query( $connect, "SELECT * FROM guide AS g JOIN city AS ct ON g.City_ID = ct.City_ID" )
                            or die("Can not execute query");


                                while( $rows = mysqli_fetch_array( $returnobj ) ) {
                                    extract( $rows );
                                      ?>

                                      <tr>
                                          <td>
                                              <img src="<?php echo $Image?>" width="125" height="150">
                                          </td>
                                          <td>
                                            <input id="button2" type="button" value="<?php echo $Name?>" onclick="showProfile('<?php echo $row['guid_id']?>');">
                                          </td>
                                          <td><?php echo $City ?></td>
                                          <td><?php echo $Contact_no ?></td>
                                          <td><?php echo $Email ?></td>
                                          <td><?php echo $nid?></td>
                                          <td><?php echo $Joining_Date ?></td>

                                          <?php
                                          if($access == 'admin'){
                                              ?>
                                              <td><?php echo $Address?></td>
                                              <td><?php echo $Bank_Account_no ?></td>
                                              <td><img src="<?php echo $pv_Image?>" width="125" height="150"></td>
                                              <?php
                                          }
                                            ?>

                                          <td>
                                            <input id="button2" type="button" value="Delete" onclick="deleteProfile('<?php echo $row['guid_id']?>');">
                                          </td>
                                          <?php

                                  }

                          ?>


<!--------------------------------------------------------------------------------------------------------------------------------------->


    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
