<?php
session_start();
require_once('connect.php');

//Redirect if guest attempts to view page
if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seneca | Job Board</title>
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
      <a class="navbar-brand" href="https://cs.csubak.edu/~kgregory/4910/dashboard.php">Dashboard</a>
      <!--<a class="navbar-brand" href="./settings.php">.$_SESSION['user_fname'].</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://cs.csubak.edu/~kgregory/4910/jobboard.php">JOB BOARD</a></li>
        <li><a href="https://cs.csubak.edu/~aparker/Seneca/employees.php">EMPLOYEES</a></li>
        <li><a href="https://cs.csubak.edu/~aparker/Seneca/customers.php">CUSTOMERS</a></li>
        <li><a href="#">JOB HISTORY</a></li>
        <li><a href="https://cs.csubak.edu/~kgregory/4910/logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Container (Dashboard Section) -->
<div id="dashboard" class="container-fluid">

<div class="text-center" style="background-color: #f4511e; color: #fff; padding: 70px 25px; font-family: Montserrat, sans-serif;">
    <h1>Job Board</h1> 
</div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="" style="overflow-x: auto;">
            <table>
                <tr class="bg-grey" style="border: 5px solid #ddd;">
                    <th>Start</th>
                    <th>Due</th>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>ZIP</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Techs</th>
                    <th>Username</th>
                    <th>Created</th>
                </tr>
<?php
if(isset($_SESSION['active'])) { // if active user -> display job board
    $result = pg_query($db, "SELECT * FROM jobboardview");

    while($row = pg_fetch_row($result)) {
        echo "<tr>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td>".$row[4]."</td>";
        echo "<td>".$row[5]."</td>";
        echo "<td>".$row[6]."</td>";
        echo "<td>".$row[7]."</td>";
        echo "<td>".$row[8]."</td>";
        echo "<td>".$row[9]."</td>";
        echo "<td>".$row[10]."</td>";
        echo "</tr>";
    }
}
?>
            </table>
        </div>
    </div>
  </div>
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
</script>

</body>
</html>
