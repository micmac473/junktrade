<?php
if(!isset($_SESSION)){
  session_start();
}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>JunkTrade</title>

    <!-- google font  -->
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">

    <!-- Latest compiled and minified CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sweetalert CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href ="../css/main.css" rel ="stylesheet">

    <!-- Weather Icons CSS -->
    <link href ="../css/weather-icons.min.css" rel ="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    
    <!-- Scripts-->
    <!-- AngularJS JavaScript file  -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <!-- AngularJS Route module -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- Sweetalert JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Main JS file-->
    <script src="../js/main.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    <style>
      ./*city{
        background-image:url(http://www.buyandsellnow.ca/wp-content/uploads/2016/06/3d_banner_background.png);
        
      } */
    </style>
</head>
<body>
  <div id="wrapper">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a id="menu-toggle" href="#" class="navbar-brand glyphicon glyphicon-menu-hamburger btn-menu toggle"> </a>
        <a class="navbar-brand" href="homepage.php"><img alt ="logo" width ="30px" height ="30px" src =../img/logo.png></a>
        <!--<a class="navbar-brand" href ="homepage.php">JunkTrade</a> -->
        <!--<a class ="navbar-brand" href ="homepage.php">junkTrade</a> -->
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Electronics</a></li>
              <li><a href="#">Furniture</a></li>
              <li><a href="#">Books & Magazines</a></li>
              <li><a href="#">Clothes</a></li>
            </ul>
          </li>
        </ul>

        <!--<form class="navbar-form navbar-left" role="form" action ="search.php?go">
          <div class="form-group">
            <input type="text" placeholder="Search for Junk" class="form-control" name="searchname">
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true" name="searchsubmit"></i></button>
        </form> -->

        <ul class="nav navbar-nav navbar-right">
          <li data-toggle="modal" data-target="#requestModal"> <a href="#" data-toggle="tooltip" title="Upload item"> <i class="fa fa-plus fa-2x" aria-hidden="true"></i> </a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-2x" aria-hidden="true" ></i><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php">My Profile</a></li>
              <li><a href="trade.php">My Requests</a></li>
              <li><a href="login.php">Log Out</a></li>
              <!-- <li><a href="google.com">Help</a></li> -->
            </ul>
          </li>
          
          <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell fa-2x" aria-hidden="true" ></i><span class="label label-danger label-as-badge" style="vertical-align:top" id ="requestsNotify"></span></a>
            <ul class="dropdown-menu" id="requests">
                <!-- <li><a href="#">Dynamically Populated Requets</a></li> -->
                
            </ul>

          </li>
          <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gavel fa-2x" aria-hidden="true" ></i><span class="label label-danger label-as-badge" style="vertical-align:top;" id ="decisionsNotify"></span></a>
            <ul class="dropdown-menu" id="decisions">
                <!-- <li><a href="#">Dynamically Populated Requets</a></li> -->
                
            </ul>

          </li>
          
        </ul>
        <form class="navbar-form" role="form" action ="search.php?go">
        <div class="form-group" style="display:inline;">
          <div class="input-group" style="display:table;">
            <input class="form-control" name="searchname" placeholder="Search for Junk" autocomplete="off" autofocus="autofocus" type="text">
            <span class="input-group-addon" class="btn btn-default" style="width:1%;" name="searchsubmit">
              <a href="search.php?go"><span class="glyphicon glyphicon-search"></span> </a>
            </span>
          </div>
        </div>
      </form>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
  <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="homepage.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile</a>
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-bell fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Notifications</a>
                </li>
                <li>
                    <a href="trade.php"><i class="fa fa-gavel fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Requests</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;People</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bookmark fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saved Items</a>
                </li>
                <li>
                    <a href="meetup.php"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meet up</a>
                </li>
                <li>
                    <a href="login.php"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout</a>
                </li>
                <li class="footerHome">
                  <p><strong> &copy;2017 JunkTrade </strong></p>
                </li>
            </ul>
        </div>
  <div class="jumbotron">
    <div class="container-fluid">
      <h1 style="color:#096790 ;text-shadow: 3px 3px white;font-family: 'Bowlby One SC', cursive; text-align: center;"> 
          <?php  
            date_default_timezone_set("America/Grenada");
            $hour = date("H");
            //echo $hour;
            //$hour = 6;
            if($hour >= 0 && $hour < 12){
              if($hour < 6){
                echo "Good Morning, ".$_SESSION["user"]."! <i class='wi wi-moonset'></i>";
              }
              else if ($hour >=6 && $hour <=7){
                echo "Good Morning, ".$_SESSION["user"]."! <i class='wi wi-sunrise'></i>";
              }
              else{
                echo "Good Morning, ".$_SESSION["user"]."! <i class='wi wi-day-sunny'></i>";
              }
              
            }
            else if($hour >= 12 && $hour < 18){
              echo "Good Afternoon, ". $_SESSION["user"]. "! <i class='wi wi-day-sunny'></i>";
            }
            else{
              if($hour == 18){
                echo "Good Evening, ". $_SESSION["user"]. "! <i class='wi wi-sunset'></i>";
              }
              else{
                echo "Good Evening, ". $_SESSION["user"]. "! <i class='wi wi-night-clear'></i>";
              }
              
            }
          ?>
      </h1>
    </div>
  </div>


<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

