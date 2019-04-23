<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
} else if (isset($_GET['unassign'])) {
    $jobID = $_GET['unassign'];
    pg_query("SELECT deletework('$jobID')");
    
    header("Location: https://cs.csubak.edu/~kgregory/4910/jobboard.php");
    exit();
}
?>
