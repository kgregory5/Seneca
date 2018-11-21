<?php
session_start();
require_once('connect.php');

//Redirect if guest attempts to view page
//if(!isset($_SESSION['active'])) {
//    header("Location: ./home.php"); 
//    exit();
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seneca | Profile Settings</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="./dashboard.php">Dashboard</a>
      <!--<a class="navbar-brand" href="./settings.php">.$_SESSION['user_fname'].</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./jobboard.php">JOB BOARD</a></li>
        <li><a href="#">EMPLOYEES</a></li>
        <li><a href="#">CUSTOMERS</a></li>
        <li><a href="#">JOB HISTORY</a></li>
        <li><a href="./logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="settings" class="jumbotron text-center">
    <h1>Settings</h1> 
</div>

<form>

<!-- Container (Profile Settings) -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h2>Push Notification</h2><br>
      <ul>
      <div class="col-lg-6 col-md-6 col-sm-12">
      <li><h4>Email</h4> 
        <ul>
        <li><p><b>Mentions</b>: be notified if someone tags you in a ticket. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio1" checked>On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio2">Off
            </label>
        </p></li>
        <li><p><b>Replies</b>: be notified if someone has replied to your ticket. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio3" checked>On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio4">Off
            </label>
        </p></li>
        <li><p><b>Assigned</b>: be notified if a ticket is assigned to you. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio5" checked>On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio6">Off
            </label>
        </p></li>
        <li><p><b>Closed</b>: be notified if your ticket is closed. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio8">On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio8" checked>Off
            </label>
        </p></li>
        </ul>
      </li>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
      <li><h4>Mobile</h4> 
        <ul>
        <li><p><b>Mentions</b>: be notified if someone tags you in a ticket. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio9" checked>On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio10">Off
            </label>
        </p></li>
        <li><p><b>Replies</b>: be notified if someone has replied to your ticket. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio11" checked>On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio12">Off
            </label>
        </p></li>
        <li><p><b>Assigned</b>: be notified if a ticket is assigned to you. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio13" checked>On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio14">Off
            </label>
        </p></li>
        <li><p><b>Closed</b>: be notified if your ticket is closed. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio15">On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio16">Off
            </label>
        </p></li>
        </ul>
      </li>
      </div>
      </ul>
    </div>
  </div>
</div>

<!-- Container (Accessibility) -->
<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-12">
      <h2>Accessibility</h2>
      <ul>
      <li><h4>Vision</h4>
        <ul>
        <li><p><b>Increase Color Contrast</b>: Improves legibility by increasing the contrast between text and background colors. &nbsp;&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="optradio15">On
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio16" checked>Off
            </label>
            <br>
        </p></li>
        </ul></li>
      </ul>   
    </div>
  </div>
</div>


</form>


<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p style="letter-spacing: 5px;">
    <a href="http://facebook.com/seneca.seneca.35110/" target='blank'> <i class="fa fa-facebook"style="font-size:24px;color:#f4511e"> </i> </a>
    <a href="https://twitter.com/SoftwareSeneca/" target='blank'><i class="fa fa-twitter" style="font-size:24px;color:#f4511e"></i></a>
    <a href="http://instagram.com/seneca_software/" target='blank'><i class="fa fa-instagram" style="font-size:24px;color:#f4511e"></i></a>
    <a href="http://youtube.com/channel/UC5X37UbmmnamTLEKWg5sKHw/" target='blank'><i class="fa fa-youtube" style="font-size:24px;color:#f4511e"></i></a>
  </p>
  <p>2018 Seneca Innovations</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
