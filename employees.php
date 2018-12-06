<?php
session_start();
//require_once('connect.php');
$db = pg_connect("host=ec2-54-243-187-30.compute-1.amazonaws.com port=5432 dbname=dc29u058iceh05 user=jxvgftvbcoxhlv password=39b27ba10da6601c066bd21ac4cf85ee70afaa17b73decbcd821f8e24e43db17");
/*if(empty($_POST['submit'])) {
  if(isset($eID)) {unset($eID);}
  $full[0] = 'NULL';
}*/
if(isset($_POST['submit'])) {
        if(isset($_POST['search'])) {
            $name = $_POST['search'];
            $full = explode(" ", $name);}
            //if(empty($full[0])) {unset($full);}
            //if(empty($full[0])) {$full='all';}
            //if(isset($eID)) {unset($eID);}
            //unset($_POST['submit']);
        //if(isset($_POST['sess'])) {$sessions = $_POST['sess'];}
        //if(isset($_POST['pID'])) {$programID = $_POST['pID'];}

    }
    /*if(isset($_GET['info1']) and !isset($_POST['submit'])) {
              $eID = $_GET['info1'];
            }*/
//Redirect if guest attempts to view page
//if(!isset($_SESSION['active'])) {
//    header("Location: ./home.php"); 
//    exit();
//}
?>
<?php
/*if(isset($_GET['info1'])) {
  $eID = $_GET['info1'];
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seneca | Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script>
  function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
} 
</script>
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
  .open-button {
  background-color: #f4511e;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  height:580px;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  overflow:auto;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 0px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #f4511e;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
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
      <a class="navbar-brand" href="./dashboard.php">Dashboard</a>
      <!--<a class="navbar-brand" href="./settings.php">.$_SESSION['user_fname'].</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./jobboard.php">JOB BOARD</a></li>
        <li><a href="employees.php">EMPLOYEES</a></li>
        <li><a href="customers.php">CUSTOMERS</a></li>
        <li><a href="#">JOB HISTORY</a></li>
        <li><a href="./logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Container (Dashboard Section) -->
<div class="content-wrapper">
<div id="dashboard" class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-sm-12 bg-grey" style="max-width:800px">
      <h1 class="page-head-line" style="min-width:800px">Employee Center</h1>
    </div>
  </div>
  <div class="row">
  <div class="panel panel-default" style="border: 3px solid #000000;max-width:800px">
                        <div class="panel-heading" style="background-color:#000000;">
                          Employees
                          <form method="post" action="" style="float:right">
                            <input type="text" name="search" style="color:black">
                            <input type="submit" name="submit" value="Search" style="color:black">
                          </form>
                        </div>
                        <div class="panel-body" style="max-width:800px">
                            <div class="table-responsive" style="max-width:800px">
                                <form method="post" action="">
                                <table class="table table-striped" style="border-collapse: collapse;max-width:800px">
                                    <thead>
                                        <tr>
                                          <?php if(isset($full[0])) { ?>
                                            <th>User</th>
                                            <th>Username</th>
                                            <th>Employee</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Rate</th>
                                            <th>Commissioned</th>
                                            <th>Action</th>
                                          <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if(isset($full[1])) {
                                        //unset($eID);
                                        $psql = pg_query("SELECT * FROM employeeview WHERE firstname='$full[0]' AND lastname='$full[1]'");
                                        $result = pg_fetch_all($psql);
                                        foreach($result as $array) {
                                          $user = $array['pk_user'];
                                          echo '<tr>';
                                          echo '<td>' . $array['pk_user'].'</td>';
                                          echo '<td>' . $array['username'].'</td>';
                                          echo '<td>' . $array['pk_employee'].'</td>';
                                          echo '<td>' . $array['firstname'].'</td>';
                                          echo '<td>' . $array['lastname'].'</td>';
                                          echo '<td>' . $array['ephone'].'</td>';
                                          echo '<td>' . $array['rate'].'</td>';
                                          echo '<td>' . $array['iscommission'].'</td>';
                                          echo '<td>' . "<a href=employeeinfo.php?info1=" . $user . ">Info</a>".' </td></tr>';
                                          //echo '</tr>';
                                        }
                                      } elseif(isset($full[0]) and !empty($full[0])) {
                                        //unset($eID);
                                          $psql = pg_query("SELECT * FROM employeeview WHERE firstname='$full[0]'");
                                        $result = pg_fetch_all($psql);
                                        foreach($result as $array) {
                                          $user = $array['pk_user'];
                                          echo '<tr>';
                                          echo '<td>' . $array['pk_user'].'</td>';
                                          echo '<td>' . $array['username'].'</td>';
                                          echo '<td>' . $array['pk_employee'].'</td>';
                                          echo '<td>' . $array['firstname'].'</td>';
                                          echo '<td>' . $array['lastname'].'</td>';
                                          echo '<td>' . $array['ephone'].'</td>';
                                          echo '<td>' . $array['rate'].'</td>';
                                          echo '<td>' . $array['iscommission'].'</td>';
                                          echo '<td>' . "<a href=employeeinfo.php?info1=" . $user . ">Info</a>".' </td></tr>';
                                          //echo '<td>' . "<a href=employeeinfo.php?info1=" . $user . ">Info </a><a href=edelete.php?delete=" . $user . ">Delete</a>".' </td></tr>';
                                        }
                                      } elseif(empty($full[0]) and isset($full[0])) {
                                          $psql = pg_query("SELECT * FROM employeeview");
                                        $result = pg_fetch_all($psql);
                                        foreach($result as $array) {
                                          $user = $array['pk_user'];
                                          echo '<tr>';
                                          echo '<td>' . $array['pk_user'].'</td>';
                                          echo '<td>' . $array['username'].'</td>';
                                          echo '<td>' . $array['pk_employee'].'</td>';
                                          echo '<td>' . $array['firstname'].'</td>';
                                          echo '<td>' . $array['lastname'].'</td>';
                                          echo '<td>' . $array['ephone'].'</td>';
                                          echo '<td>' . $array['rate'].'</td>';
                                          echo '<td>' . $array['iscommission'].'</td>';
                                          echo '<td>' . "<a href=employeeinfo.php?info1=" . $user . ">Info</a>".' </td></tr>';
                                        }
                                      } /*elseif(!isset($eID)) {
                                        //unset($eID);
                                          $psql = pg_query("SELECT * FROM employeeview");
                                        $result = pg_fetch_all($psql);
                                        foreach($result as $array) {
                                          $user = $array['pk_user'];
                                          echo '<tr>';
                                          echo '<td>' . $array['pk_user'].'</td>';
                                          echo '<td>' . $array['username'].'</td>';
                                          echo '<td>' . $array['pk_employee'].'</td>';
                                          echo '<td>' . $array['firstname'].'</td>';
                                          echo '<td>' . $array['lastname'].'</td>';
                                          echo '<td>' . $array['ephone'].'</td>';
                                          echo '<td>' . $array['rate'].'</td>';
                                          echo '<td>' . $array['iscommission'].'</td>';
                                          echo '<td>' . "<a href=employees.php?info1=" . $user . "'>Info</a>".' </td></tr>';
                                        }
                                      }*/
                                       ?>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>
                  </div>
                  <button class="open-button" style="float:right;color:black" onclick="openForm()">Add Employee</button>

                            <div class="form-popup" id="myForm">
                              <form action="eadd.php" class="form-container" method="post">
                              <h1 style="color:black">Add Employee</h1>

                              <!--<label for="user" style="color:black"><b>User ID</b></label>
                              <input type="hidden" placeholder="Enter ID" name="uID" style="color:black" required>-->

                              <label for="uname" style="color:black"><b>Username</b></label>
                              <input type="text" placeholder="Enter Username" name="user" style="color:black" required>

                              <label for="psw" style="color:black"><b>Password</b></label>
                              <input type="password" placeholder="Enter Password" name="psw" style="color:black" required>

                              <!--<label for="emp" style="color:black"><b>Employee ID</b></label>
                              <input type="hidden" placeholder="Enter ID" name="uID" style="color:black" required>-->

                              <label for="Fname" style="color:black"><b>First Name</b></label>
                              <input type="text" placeholder="Enter First Name" name="first" style="color:black" required>

                              <label for="Lname" style="color:black"><b>Last Name</b></label>
                              <input type="text" placeholder="Enter Last Name" name="last" style="color:black" required>

                              <label for="pNo" style="color:black"><b>Phone No.</b></label>
                              <input type="text{}" placeholder="Enter Phone Number" name="phone" style="color:black" required>

                              <!--<label for="pay" style="color:black"><b>Pay Rate</b></label>
                              <input type="text" placeholder="Enter Pay" name="rate" style="color:black" required>-->

                              <!--<label for="comm" style="color:black"><b>Commisioned</b></label>
                              <input type="text" placeholder="Active?" name="work" style="color:black" required>-->

                              <button type="submit" class="btn" name="insert">Add</button>
                              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                              </form>
                            </div>
                        </div>
                  <?php 
                    /*if(isset($eID)) {
                      echo '<div class="row">';
                      echo '<div class="row">';
                      echo '<div class="col-md-12" style="max-width:400px">';
                      //echo '<div class="col-md-6">';
                      echo '<div class="panel panel-default" style="border: 3px solid #000000">';
                      echo '<div class="panel-heading">';
                      echo "Job History";
                      echo '</div>';
                      echo '<div class="panel-body">';
                      echo '<div class="table-responsive">';
                      echo '<table class="table table-striped">';
                      echo '<thead>';
                      $psql = pg_query("SELECT * FROM jobhistoryview");
                      $result = pg_fetch_all($psql);
                      foreach($result as $array) {
                        //$user = $array['pk_user'];
                        echo '<tr>';
                        echo '<td>' . $array['pk_job'].'</td>';
                        echo '<td>' . $array['status'].'</td>';
                        echo '<td>' . $array['invoicenumber'].'</td>';
                        echo '<td>' . $array['customername'].'</td>';
                        echo '<td>' . $array['address'].'</td>';
                        echo '<td>' . $array['zipcode'].'</td>';
                        echo '<td>' . $array['type'].'</td>';
                        echo '<td>' . $array['techs'].'</td>';
                        echo '<td>' . $array['checkin'].'</td>';
                        echo '<td>' . $array['checkout'].'</td>,/tr>';
                        //echo '<td>' . "<a href=employees.php?info1=" . $user . "'>Info</a>".' </td></tr>';
                                        }
                      echo '</thead>';
                      echo '<tbody>';
                      echo '</tbody>';
                      echo '</table>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '<div class="col-md-12" style="max-width:400px">';
                      //echo '<div class="col-md-6">';
                      echo '<div class="panel panel-default" style="border: 3px solid #000000">';
                      echo '<div class="panel-heading">';
                      echo "Current Jobs";
                      echo '</div>';
                      echo '<div class="panel-body">';
                      echo '<div class="table-responsive">';
                      echo '<table class="table table-striped">';
                      echo '<thead>';
                      $psql = pg_query("SELECT * FROM jobview");
                      $result = pg_fetch_all($psql);
                      foreach($result as $array) {
                        //$user = $array['pk_user'];
                        echo '<tr>';
                        echo '<td>' . $array['pk_job'].'</td>';
                        echo '<td>' . $array['fk_problem'].'</td>';
                        echo '<td>' . $array['fk_location'].'</td>';
                        echo '<td>' . $array['status'].'</td>';
                        echo '<td>' . $array['paymethod'].'</td>';
                        echo '<td>' . $array['priority'].'</td>';
                        echo '<td>' . $array['workorder'].'</td>';
                        echo '<td>' . $array['invoicenumber'].'</td>';
                        echo '<td>' . $array['jobtotal'].'</td>';
                        echo '<td>' . $array['etastart'].'</td>';
                        echo '<td>' . $array['estduration'].'</td>';
                        echo '<td>' . $array['jnotes'].'</td>';
                        echo '<td>' . $array['customerrating'].'</td>';
                        echo '<td>' . $array['dueby'].'</td>';
                        echo '<td>' . $array['fk_users'].'</td>';
                        echo '<td>' . $array['created'].'</td>,/tr>';
                      }
                      echo '</thead>';
                      echo '<tbody>';
                      echo '</tbody>';
                      echo '</table>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';*/                

                    //}
                  ?>
                </div>
  </div>
</div>
</div>
<!-- Create ability to add, delete, edit employees. View diff employee info-->

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
