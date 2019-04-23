<?php
session_start();
//require_once('connect.php');
$db = pg_connect("host=ec2-54-243-187-30.compute-1.amazonaws.com 
                  port=5432 dbname=dc29u058iceh05 user=jxvgftvbcoxhlv 
                  password=39b27ba10da6601c066bd21ac4cf85ee70afaa17b73decbcd821f8e24e43db17");

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
} else {
    $jProblem = $_GET['problem'];
    $jLocation = $_GET['location'];
    $jStatus = "Unassigned";
    $jPaymeth = $_GET['paymeth'];
    $jPriority = $_GET['priority'];
    $jWorkorder = $_GET['workorder'];
    $jInvNum = "NULL";
    $jJobtot = $_GET['jobtot'];
    $jStart = "NULL";
    $jDue = $_GET['due'];
    $jDuration = $_GET['duration'];
    $jNotes = $_GET['notes'];
    $jRating = "NULL";
    $jUser = $_SESSION['user_id'];
    //$jTechnician = $_POST['technician'];  // not given to addjob
    //$jCustomer = $_POST['customer'];      // not given to addjob

    // addjob() order: problem, location, status, payment method, priority, wo, invnum, jobtot, eta start, due, duration, nts, rating, user 
   
    pg_query("SELECT addjob($jProblem,$jLocation,'Unassigned','$jPaymeth','$jPriority','$jWorkorder',NULL,'$jJobtot',NULL,'$jDue','$jDuration','$jNotes',NULL,$jUser)");

    //DO NOT REMOVE...FOR TESTING
    //pg_query("SELECT addjob($jProblem,$jLocation,'Unassigned',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$jUser)");

    header("Location: https://cs.csubak.edu/~kgregory/4910/jobboard.php");
    exit();
}
?>
