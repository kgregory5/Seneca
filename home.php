<?php
session_start();
require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seneca | Home</title>
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
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
  }
  .carousel-indicators li {
    border-color: #f4511e;
  }
  .carousel-indicators li.active {
    background-color: #f4511e;
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
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
        opacity: 0;
        transform: translateY(70%);
    } 
    100% {
        opacity: 1;
        transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
        opacity: 0;
        -webkit-transform: translateY(70%);
    } 
    100% {
        opacity: 1;
        -webkit-transform: translateY(0%);
    }
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
      <a class="navbar-brand" href="#myPage">Seneca</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-log-in"></span> Login
            </a>
            <ul class="dropdown-menu" style="background-color: #f4511e !important;">
                <form action='login.php' method='POST' style='padding: 4px 5px 0px 5px;'>
                    <div class="input-group">
                            <span class="input-group-addon" style="color: #f4511e !important; border-radius: 0 !important;"><i class="glyphicon glyphicon-user"></i></span> 
                            <input type="text" class="form-control" style="color: #f4511e !important; border-radius: 0 !important;" name="username" placeholder='Username'>
                    </div>
                    <div class="input-group">
                            <span class="input-group-addon" style="color: #f4511e !important; border-radius: 0 !important;"><i class="glyphicon glyphicon-lock"></i></span> 
                            <input type="password" class="form-control" style="color: #f4511e !important; border-radius: 0 !important;" name="password" placeholder='Password'>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <input class="form-control" style="color: #f4511e !important; border-radius: 0 !important;" type='submit' value='Login'>
                        </div>
                    </div>
                </form>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
    <h1>Seneca</h1> 
  <p>Be the first to know about our updates.</p> 
  <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Seneca</h2><br>
      <h4>Seneca was established to solve problems that non-corporate companies encounter. Most scheduling softwares are overkill and very busy for average sized companies in the United States. These softwares may suit large bussinesses, but it is not an ideal system for small to medium businesses. Thus, the creation of the Seneca scheduling software.</h4><br>
      <p>We understand all companies at some point become short handed or overstaffed. The Seneca software is here to make sure the average companies work flow is not affected by those changes. We designed a system to submit a ticket, assig the ticket to an employee, and then inform all parties about the job details. It is important to us to deliver products that will improve our customers reputation. With the algorithms used in our scheduling software, we are confident our clients customers will see an improvement in communication and time management.</p>
      <br><a style="text-decoration: none;" href="#contact"><button class="btn btn-default btn-lg">Get in Touch</button></a>
    </div>
    <div class="col-sm-4">
        <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><strong>MISSION:</strong> Our mission is to distribute an innovative software that prevents time conflicts and ineffective route planning. This is accomplished through our user friendly environment and automated job assignments. Time management is crucial for every business and with the algorithms used in our software we can ensure maximum efficiency for your business.</h4><br>
      <p><strong>VISION:</strong> Our vision involves our clients and their customers. Picture Seneca as the middle man for you and your customers. All data will reach both parties reaches its destination and make each party Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>MANAGED SERVICES</h4>
      <p>Consider Seneca if you are experiencing constraints financially, with staff, or with time.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>DATA SECURITY</h4>
      <p>Data is encrypted and parsed to ensure all information is cannot be obtained by a malicious user.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-phone logo-small"></span>
      <h4>Mobile Application</h4>
      <p>Optimizations have been put forth to provide a responsive mobile application on all devices.</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-tasks logo-small"></span>
      <h4>VIRTUALIZATION</h4>
      <p>Our virtual server allows for quick server reboots and remote connectivity.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>Stop purchasing office supplies and save by using our digital applications.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cog logo-small"></span>
      <h4 style="color:#303030;">Unified Communications</h4>
      <p>Push notifications and a restrained commenting system allow your customers, your employees, and yourself will be in sync 24/7.</p>
    </div>
  </div>
</div>

<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you.</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Basic</h1>
        </div>
        <div class="panel-body">
          <p><strong>250</strong> Accounts</p>
          <p>Track and prioritize customer tickets</p>
          <p>Engage customers in real-time via messages</p>
          <p>Solve customer issues proactively</p>
          <p><strong>Basic</strong> Support</p>
        </div>
        <div class="panel-footer">
          <h3>$49</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Pro</h1>
        </div>
        <div class="panel-body">
          <p><strong>500</strong> Accounts</p>
          <p>Track and prioritize customer tickets</p>
          <p>Engage customers in real-time via messages</p>
          <p>Solve customer issues proactively</p>
          <p><strong>24/5</strong> Pro Support</p>
        </div>
        <div class="panel-footer">
          <h3>$99</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <p><strong>1,000</strong> Accounts</p>
          <p>Track and prioritize customer tickets</p>
          <p>Engage customers in real-time via messages</p>
          <p>Solve customer issues proactively</p>
          <p><strong>24/7</strong> Premium Support</p>
        </div>
        <div class="panel-footer">
          <h3>$199</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>    
  </div>
  <div class="text-center">
      <h5>Was there a plan for you? If not, fill out the form in the contact section below.</h5>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Bakersfield, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +1 661-123-4567</p>
      <p><span class="glyphicon glyphicon-envelope"></span> seneca@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

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
