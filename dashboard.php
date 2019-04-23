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
  <title>Seneca | Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cs.csubak.edu/~kgregory/4910/grabLocation.js"></script>
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
  input, select {
      width: 100%;
      padding: 10px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  }
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 50px 25px;
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
  .form-popup {
      display: none;
      position: fixed;
      top: 50px;
      bottom: 10px;
      left: 100px;
      right: 100px;
      z-index: 9;
      overflow: scroll;
  }
  .form-header {
      max-width: 100%;
      padding: 15px;
      background-color: #f1f1f1;;
  }
  .form-container {
      max-width: 100%;
      padding: 15px;
      background-color: #f1f1f1;;
  }
  .form-container .btn {
      width: 100%;
      padding: 16px 20px;
      margin-bottom: 10px;
      border: none;
      cursor: pointer;
      color: white;
      background-color: #4CAF50;
      opacity: 0.8;
  }
  .form-container .cancel {
      background-color: red;
  }
  .form-container .btn:hover, .open-button:hover {
      opacity: 1;
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
    .form-popup {
        display: none;        
        padding: 16px 20px;
        margin-bottom: 10px;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
    }
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
      <a class="navbar-brand" href="./dashboard.php">Seneca</a>
      <!--<a class="navbar-brand" href="./settings.php">.$_SESSION['user_id']./a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a onclick="openForm()">CREATE JOB</a></li>
        <li><a href="https://cs.csubak.edu/~kgregory/4910/logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="form-popup" id="createTicket">
    <div class="form-header">
        <h2 class="text-center">Create Job</h2>
    </div>
    <form action="https://cs.csubak.edu/~kgregory/4910/addJob.php" name="createTicket" class="form-container">
        <div class="row">
            <div class="col-sm-12 bg-grey">
                <br>
                <div class="col-sm-12 bg-grey">
                    <div class="col-sm-6 bg-grey">
                        <label for="customer">Customer <span style="color:red;">*</span></label>    
                        <select id="customer" name="customer" onchange="getCustomerID(this.value)" required>
                            <option value="NULL">Unassigned</option>
                            <?php
                                $cust = pg_query("SELECT pk_customer, customername FROM customerview;");
                                while ($row_cust = pg_fetch_assoc($cust)) {
                            ?>
                            <option value=<?php echo $row_cust["pk_customer"]; ?>>
                                <?php echo $row_cust["customername"]; ?>
                            </option>
                            <?php } ?>
                        </select>
                        <hr>
                    </div>
                    <div class="col-sm-6 bg-grey" id="locate" name="locate">
                        <label for="location">Location <span style="color:red;">*</span></label>    
                        <select id="location" name="location" required>
                        </select>
                        <hr>
                    </div>
                </div>
                <div class="col-sm-12 bg-grey">
                    <div class="col-sm-6 bg-grey">
                        <?php
                        $soonest = pg_query("SELECT soonest_available();");
                        $soonestTime = pg_fetch_row($soonest);
                        ?>
                        <label for="due">Schedule Time</label>    
                        <!-- <input type="datetime-local" name="due" min="2019-01-01T00:00" max="2019-12-31T23:59" placeholder="Scheduled time.."> -->
                        <input type="datetime-local" name="due" value="<?php echo $soonestTime[0]; ?>">
                        <hr>
                    </div>
                    <div class="col-sm-6 bg-grey">
                        <label for="duration">Estimated Duration</label>    
                        <input type="text" name="duration" value="01:00:00">
                        <!-- <select id="duration" name="duration">
                            <?php 
                                /*for($hours = 0; $hours < 24; $hours++) {
                                    for($mins = 0; $mins < 60; $mins+=30) {
                                        echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                                            .str_pad($mins,2,'0',STR_PAD_LEFT).'</option';
                                    }
                                }*/
                            ?>
                        </select> -->
                        <hr>
                    </div>
                </div>
                <div class="col-sm-12 bg-grey">
                    <div class="col-sm-6 bg-grey">
                        <label for="problem">Problem <span style="color:red;">*</span></label>   
                        <select name="problem" required>
                            <option value="">Unassigned</option>
                            <?php
                                $prob = pg_query("SELECT pk_problem, type FROM problem;");
                                while ($row_prob = pg_fetch_assoc($prob)) {
                            ?>
                            <option value=<?php echo $row_prob["pk_problem"]; ?>>
                                <?php echo $row_prob["type"]; ?>
                            </option> 
                            <?php } ?>
                        </select>
                        <hr>
                    </div>
                    <div class="col-sm-6 bg-grey">
                        <label for="paymeth">Payment Method</label>   
                        <select name="paymeth">
                            <option value="">Unknown</option>
                            <option value="Cash">Cash</option>
                            <option value="Charge">Charge</option>
                            <option value="Check">Check</option>
                            <option value="Card">Credit Card</option>
                            <option value="Estimate">Estimate</option>
                            <option value="Nocharge">No charge</option>
                        </select>
                        <hr>
                     </div>
                </div>
                <div class="col-sm-12 bg-grey">
                    <div class="col-sm-6 bg-grey">
                        <label for="workorder">Work Order</label>    
                        <input type="text" name="workorder" placeholder="Workorder..">
                        <hr>
                    </div>
                    <div class="col-sm-6 bg-grey">
                        <label for="jobtot">Approval Amount</label>    
                        <input type="text" name="jobtot" value="" placeholder="Job Amount..">
                        <hr>
                    </div>
                </div>
                <div class="col-sm-12 bg-grey">
                    <div class="col-sm-6 bg-grey">
                        <label for="priority">Priority</label>    
                        <select name="priority" required>
                            <option value="Normal">Normal</option>
                            <option value="High">High</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 bg-grey">
                    <hr>
                    <label for="notes">Notes</label>    
                    <input type="text" name="notes" placeholder="Notes..">
                </div>
                <div class="col-sm-12 bg-grey">
                    <button type="submit" class="btn" name="insert">Submit</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Container (Dashboard Section) -->
<div id="dashboard" class="container-fluid">
  <div class="text-center" style="background-color: #f4511e; color: #fff; padding: 70px 25px; font-family: Montserrat, sans-serif;">
      <h1>Dashboard</h1> 
  </div>
  <div class="row">
    <!-- <div class="col-sm-6 text-center" id="piechart1" style="min-height: 400px;">
      <div id="piechart1"></div>
    </div>
    <div class="col-sm-6 text-center" style="min-height: 400px;">
      <div id="piechart2"></div>
    </div> -->
    <div class="col-sm-6 text-center" style="min-height: 300px;">
      <a href="https://cs.csubak.edu/~kgregory/4910/jobboard.php"><h2>JOB BOARD</h2></a>
      <i class="glyphicon glyphicon-list-alt logo"></i>
      <p>View all tickets in the system.</p>
    </div>
    <div class="col-sm-6 text-center" style="min-height: 300px;">
      <a href="https://cs.csubak.edu/~aparker/Seneca/customers.php"><h2>CUSTOMER CENTER</h2></a>
      <i class="glyphicon glyphicon-user logo"></i>
      <p>Create, modify, and delete employees.</p>
      <p><b>Total Customers:</b></p>
    </div>
    <div class="col-sm-6 text-center" style="min-height: 300px;">
      <a href="https://cs.csubak.edu/~kgregory/4910/employeeSkill.php"><h2>EMPLOYEE SKILLS</h2></a>
      <i class="glyphicon glyphicon-list-alt logo"></i>
      <p>Add and update an employee's skills.</p>
    </div>
    <div class="col-sm-6 text-center" style="min-height: 300px;">
      <a href="https://cs.csubak.edu/~aparker/Seneca/employees.php"><h2>EMPLOYEE CENTER</h2></a>
      <i class="glyphicon glyphicon-user logo"></i>
      <p>Create, modify, and delete employees.</p>
      <p><b>Total Employees:</b></p>
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
$(document).ready(function() {
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
});

function openForm() {
    document.getElementById("createTicket").style.display = "block";
}

function closeForm() {
    document.getElementById("createTicket").style.display = "none";
}
</script>
<script type="text/javascript">
//Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);

//Draw the chart and set the chart values
function drawChart1() {
    var data = google.visualization.arrayToDataTable([
        ['Job', 'Hours Per Day'],
        ['Water Heater', 8],
        ['Drain Clog', 2],
        ['Gas Line Leak', 4],
        ['Hydrojet', 2],
        ['Water Line Leak', 8]
    ]);

    //Optional; add a title and set the width and height of the chart
    var options = {'title':'Todays Job Types','width':400,'height':400};

    //Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    chart.draw(data, options);
}
function drawChart2() {
    var data = google.visualization.arrayToDataTable([
        ['Employee', 'Jobs Per Day'],
        ['Geralt', 3],
        ['Harry', 1],
        ['Gordon', 4],
        ['Solid', 2],
        ['Motok', 3]
    ]);

    //Optional; add a title and set the width and height of the chart
    var options = {'title':'Employee Jobs Today','width':400,'height':400};

    //Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    chart.draw(data, options);
}
</script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
function getCustomerID(CUSTOMER_ID) {
    $.ajax({url:"https://cs.csubak.edu/~kgregory/4910/insertLocation.php",data: {"CUSTOMER_ID":CUSTOMER_ID}}).done(function(data){ $("select#location").html(data);});
    //$.ajax({url:"https://cs.csubak.edu/~kgregory/4910/insertLocation.php",data: {"CUSTOMER_ID":CUSTOMER_ID}}).done(function(data){ $(console.log).html(data);});
}
</script>

</body>
</html>
