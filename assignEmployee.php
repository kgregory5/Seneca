<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
} else {
    $EMPLOYEE_ID = $_GET['technician'];
    $JOB_ID = $_GET['job_ID'];
    pg_query($db,"SELECT assign('$EMPLOYEE_ID','$JOB_ID')");
    header("Location: https://cs.csubak.edu/~kgregory/4910/jobboard.php");
    exit();
}
?>
