<?php
session_start();
require_once('connect.php');

//Redirect if guest attempts to view page
if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php"); 
    exit();
}

if (isset($_GET['assign'])) {
    $jobID = $_GET['assign'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seneca | Job Board</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cs.csubak.edu/~kgregory/4910/rangeSlider.css">
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
  table {
      border-collapse: collapse;
      border-spacing: 0;
      width 100%;
      border: 5px solid #ddd
  }  
  th {
      text-align: left;
      border: 1px solid #ddd;
      padding: 8px;
  }
  td {
      text-align: left;
      border: 2px solid #ddd;
      border-left-style: none;
      border-right-style: none;
      padding: 8px;
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
  .slideanim { visibility: hidden; }
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
      <a class="navbar-brand" href="https://cs.csubak.edu/~kgregory/4910/dashboard.php">Dashboard</a>
      <!--<a class="navbar-brand" href="./settings.php">.$_SESSION['user_fname'].</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://cs.csubak.edu/~kgregory/4910/jobboard.php">JOB BOARD</a></li>
        <li><a href="https://cs.csubak.edu/~aparker/Seneca/employees.php">EMPLOYEES</a></li>
        <li><a href="https://cs.csubak.edu/~aparker/Seneca/customers.php">CUSTOMERS</a></li>
        <li><a href="https://cs.csubak.edu/~aparker/Seneca/jobhistory.php">JOB HISTORY</a></li>
        <li><a href="https://cs.csubak.edu/~kgregory/4910/logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Container (Dashboard Section) -->
<div id="dashboard" class="container-fluid">
    <form action="https://cs.csubak.edu/~kgregory/4910/assignEmployee.php" class="form-container">
    <div class="text-center" style="background-color: #f4511e; color: #fff; padding: 70px 25px; font-family: Montserrat, sans-serif;">
    <h1>Assign Technician To Job #<?php echo $jobID; ?></h1> 
    </div><br>
    <!-- searches for technician -->
    <label for="technician">Technician: </label>    
    <select name="technician">
        <option value="NULL">Choose...</option>
        <?php
        $tech = pg_query("SELECT pk_employee, firstname, lastname FROM employeeview;");
        while ($row_tech = pg_fetch_assoc($tech)) {
        ?>
        <option value=<?php echo $row_tech["pk_employee"]; ?>>
            <?php echo $row_tech["lastname"].", ".$row_tech["firstname"].""; ?>
        </option>
        <?php } ?>
    </select>
    <div style="float:right;">
        <button type="button" onclick="techSuggestion()">Click for Suggested</button><br>
        <!-- <label for="suggested">Suggested: </label> -->
        <label><u>Suggested</u>: <span id="suggested" name="suggested"></span></label>    
        <!-- <div id="suggested" name="suggested"></div> -->
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1">
            <p>Location: <br><span id="demo1"></span></p>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10">
            <br><input type="range" min="0" max="100" value="50" class="slider" id="myRange">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
            <p>Skill: <br><span id="demo2"></span></p>
        </div>
    </div><br><br>
    <input type="hidden" name="job_ID" value="<?php echo $jobID; ?>">
    <button type="button" style="float:left;" onclick="javascript:location.href='https://cs.csubak.edu/~kgregory/4910/jobboard.php'">Cancel</button>
    <button type="submit" style="float:right;">Submit</button>
    </form>
</div>

<div id="testing" name="testing">
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
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

function techSuggestion() {
    var jID = <?php echo $jobID; ?>;
    var w1 = document.getElementById("demo1").innerHTML;
    var w2 = document.getElementById("demo2").innerHTML;
    //document.getElementById("testing").innerHTML = w1;

    $.ajax({url:"https://cs.csubak.edu/~kgregory/4910/techSuggestion.php",data: {"jID":jID,"w1":w1,"w2":w2}}).done(function(data){ $("#suggested").html(data); });

    //document.getElementById("technician").innerHTML = document.getElementById("suggested").innerHTML;
}

var slider = document.getElementById("myRange");
var demo1 = document.getElementById("demo1");
var demo2 = document.getElementById("demo2");
demo1.innerHTML = slider.value;
demo2.innerHTML = slider.value;

// Update slider value
slider.oninput = function() {
    demo1.innerHTML = this.value;
    demo2.innerHTML = 100-this.value;
}
</script>
</body>
</html>
