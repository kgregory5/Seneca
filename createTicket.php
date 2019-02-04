<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
}

if(isset($_POST['problem']) && $_POST['location']) && ($_POST['status']) && 
    ($_POST['paymeth']) && ($_POST['priority']) && 
    ($_POST['workorder']) && ($_POST['technician']) && 
    ($_POST['customer'])) {
    
    $jproblem = $_POST['problem'];
    $jLocation = $_POST['location'];
    $jStatus = $_POST['status'];
    $jPaymeth = $_POST['paymeth'];
    $jPriority = $_POST['priority'];
    $jWorkorder = $_POST['workorder'];
    $jStart = $_POST['start'];
    $jDuration = $_POST['duration'];
    $jNotes = $_POST['notes'];
    $jDue = $_POST['due'];
    $jTechnician = $_POST['technician'];
    $jCustomer = $_POST['customer'];
    $jUser = $_SESSION['user_id'];

    pg_query("SELECT addjob('$jproblem', '$jLocation', '$jStatus', '$jPaymeth', '$jPriority', '$jWorkorder', NULL, 'NULL', '$jStart', '$jDuration', '$jNotes', 'NULL', '$jDue', '$jUser');");

    // addjob function order
    //      problem, location, status, payment method, priority, wo
    //      invnum, jobtot, eta start, duration, nts, rating, due, user 
    
    header("Location: https://cs.csubak.edu/~kgregory/4910/jobboard.php");
    exit();

} else {
    echo "<h3 style='text-align:center;'>Error</h3>";
    exit();
}
?>
